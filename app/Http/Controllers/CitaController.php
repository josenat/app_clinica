<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateCitaRequest;
use App\Http\Requests\UpdateCitaRequest;
use App\Repositories\CitaRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;
use App\Models\Paciente;
use App\Models\Medico;
use App\Models\PacienteMedico;

class CitaController extends AppBaseController
{
    /** @var  CitaRepository */
    private $citaRepository;

    public function __construct(CitaRepository $citaRepo)
    {
        $this->citaRepository = $citaRepo;
    }

    /**
     * Display a listing of the Cita.
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->citaRepository->pushCriteria(new RequestCriteria($request));
        $citas = $this->citaRepository->all();  

        return view('citas.index', compact('citas'));
    }

    /**
     * Show the form for creating a new Cita.
     *
     * @return Response
     */
    public function create()
    {
        $pacientes = Paciente::pluck('nombre', 'id');
        $medicos   = Medico::pluck('nombre', 'id');

        return view('citas.create', compact('pacientes', 'medicos'));
    }

    /**
     * Store a newly created Cita in storage.
     *
     * @param CreateCitaRequest $request
     *
     * @return Response
     */
    public function store(CreateCitaRequest $request)
    {  
        // variable auxiliar
        $id_relacion = 0;
        // formatear fecha
        $request{'fecha_cita'} = self::formatDate($request{'fecha_cita'}, 'DD-MM-YYYY', 'YYYY-MM-DD');
        // si ya existe la relacion paciente medico
        if ($relacion = PacienteMedico::where('id_paciente','=',$request{'id_paciente'})
        ->where('id_medico','=',$request{'id_medico'})
        ->first(['id'])) {
            // obtener el id de dicha relacion
            $id_relacion = $relacion->id;
        
        } else {   
            // sino obtenemos el id de una nueva relacion a crear
            $id_relacion = PacienteMedico::create([
                "id_paciente" => $request{'id_paciente'},
                "id_medico"   => $request{'id_medico'}
                ])->id;    
        }

        // si obtuvimos una relacion entre paciente y medico
        if ($id_relacion > 0) {
            // guardar el nuevo id de la relacion que existe entre el paciente y el medico          
            $request{'id_paciente_med'} = $id_relacion;
            // cargar todos los datos
            $input = $request->all();
            // crear cita en funcion de la relacion paciente medico generada y demas datos
            $cita  = $this->citaRepository->create($input);
            // mensaje de exito
            Flash::success('Cita saved successfully.');            
        } else {
            // mensaje error de operacion
            Flash::error('A problem has occurred');
        }
 
        return redirect(route('citas.index'));
    }

    /**
     * Display the specified Cita.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $cita = $this->citaRepository->findWithoutFail($id);

        if (empty($cita)) {
            Flash::error('Cita not found');

            return redirect(route('citas.index'));
        }

        return view('citas.show')->with('cita', $cita);
    }

    /**
     * Show the form for editing the specified Cita.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $cita = $this->citaRepository->findWithoutFail($id);

        if (empty($cita)) {
            Flash::error('Cita not found');

            return redirect(route('citas.index'));
        }

        $pacientes = Paciente::pluck('nombre', 'id');
        $pacientes->prepend($cita->paciente_medico->paciente->nombre, $cita->paciente_medico->paciente->id);

        $medicos   = Medico::pluck('nombre', 'id');
        $medicos->prepend($cita->paciente_medico->medico->nombre, $cita->paciente_medico->medico->id);

        return view('citas.edit', compact('cita', 'pacientes', 'medicos'));
    }

    /**
     * Update the specified Cita in storage.
     *
     * @param  int              $id
     * @param UpdateCitaRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateCitaRequest $request)
    {  
        // variable auxiliar
        $id_relacion = 0;
        // formatear fecha
        $request{'fecha_cita'} = self::formatDate($request{'fecha_cita'}, 'DD-MM-YYYY', 'YYYY-MM-DD');
        // si ya existe la relacion paciente medico 
        if ($relacion = PacienteMedico::where('id_paciente','=',$request{'id_paciente'})
        ->where('id_medico','=',$request{'id_medico'})
        ->first(['id'])) {
            // obtener el id de dicha relacion 
            $id_relacion = $relacion->id;
        
        } else {   
            // sino obtenemos el id de una nueva relacion a crear
            $id_relacion = PacienteMedico::create([
                "id_paciente" => $request{'id_paciente'},
                "id_medico"   => $request{'id_medico'}
                ])->id;    
        }

        // si obtuvimos una relacion entre paciente y medico
        if ($id_relacion > 0) {
            // guardar el nuevo id de la relacion existente entre el paciente y el medico          
            $request{'id_paciente_med'} = $id_relacion;
            // validar datos
            $cita = $this->citaRepository->findWithoutFail($id);
            if (empty($cita)) {
                Flash::error('Cita not found');

                return redirect(route('citas.index')); 
            }            
            // actualizar cita en funcion de la relacion paciente medico generada y demas datos
            $cita = $this->citaRepository->update($request->all(), $id);
            // mensaje de exito
            Flash::success('Cita updated successfully.');            
        } else {
            // mensaje error de operacion
            Flash::error('A problem has occurred');
        }

        return redirect(route('citas.index'));
    }

    /**
     * Remove the specified Cita from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $cita = $this->citaRepository->findWithoutFail($id);

        if (empty($cita)) {
            Flash::error('Cita not found');

            return redirect(route('citas.index'));
        }

        $this->citaRepository->delete($id);

        Flash::success('Cita deleted successfully.');

        return redirect(route('citas.index'));
    }
}
