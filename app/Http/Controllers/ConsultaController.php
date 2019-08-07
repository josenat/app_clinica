<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateConsultaRequest;
use App\Http\Requests\UpdateConsultaRequest;
use App\Repositories\ConsultaRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;
use App\Models\Consulta;
use App\Models\Paciente;
use App\Models\Medico;
use App\Models\Documento;
use App\Models\Enfermedad;
use App\Models\PacienteMedico;

class ConsultaController extends AppBaseController
{
    /** @var  ConsultaRepository */
    private $consultaRepository;

    public function __construct(ConsultaRepository $consultaRepo)
    {
        $this->consultaRepository = $consultaRepo;
    }

    /**
     * Display a listing of the Consulta.
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->consultaRepository->pushCriteria(new RequestCriteria($request));
        $consultas = $this->consultaRepository->all();

        return view('consultas.index')
            ->with('consultas', $consultas);
    }

    /**
     * Show the form for creating a new Consulta.
     *
     * @return Response
     */
    public function create()
    {            
        $pacientes   = Paciente::pluck('nombre', 'id');
        $medicos     = Medico::pluck('nombre', 'id');
        $enfermedads = Enfermedad::pluck('nombre', 'id'); 

        return view('consultas.create', compact('pacientes', 'medicos', 'enfermedads'));
    }

    /**
     * Store a newly created Consulta in storage.
     *
     * @param CreateConsultaRequest $request
     *
     * @return Response
     */
    public function store(CreateConsultaRequest $request)
    {
        // variable auxiliar
        $id_relacion = 0;
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
            // crear consulta en funcion de la relacion paciente medico generada y demas datos
            $consulta  = $this->consultaRepository->create($input);
            // mensaje de exito
            Flash::success('Cita saved successfully.');            
        } else {
            // mensaje error de operacion
            Flash::error('A problem has occurred');
        }

        return redirect(route('consultas.index'));
    }

    /**
     * Display the specified Consulta.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $consulta = $this->consultaRepository->findWithoutFail($id);

        if (empty($consulta)) {
            Flash::error('Consulta not found');

            return redirect(route('consultas.index'));
        }

        return view('consultas.show')->with('consulta', $consulta);
    }

    /**
     * Show the form for editing the specified Consulta.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $consulta = $this->consultaRepository->findWithoutFail($id);

        if (empty($consulta)) {
            Flash::error('Consulta not found');

            return redirect(route('consultas.index'));
        }
print_r($consulta->paciente_medico->id_paciente); return;
        return view('consultas.edit')->with('consulta', $consulta);
    }

    /**
     * Update the specified Consulta in storage.
     *
     * @param  int              $id
     * @param UpdateConsultaRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateConsultaRequest $request)
    {
        $consulta = $this->consultaRepository->findWithoutFail($id);

        if (empty($consulta)) {
            Flash::error('Consulta not found');

            return redirect(route('consultas.index'));
        }

        $consulta = $this->consultaRepository->update($request->all(), $id);

        Flash::success('Consulta updated successfully.');

        return redirect(route('consultas.index'));
    }

    /**
     * Remove the specified Consulta from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $consulta = $this->consultaRepository->findWithoutFail($id);

        if (empty($consulta)) {
            Flash::error('Consulta not found');

            return redirect(route('consultas.index'));
        }

        $this->consultaRepository->delete($id);

        Flash::success('Consulta deleted successfully.');

        return redirect(route('consultas.index'));
    }
}
