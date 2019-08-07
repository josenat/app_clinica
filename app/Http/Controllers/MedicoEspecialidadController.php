<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateMedicoEspecialidadRequest;
use App\Http\Requests\UpdateMedicoEspecialidadRequest;
use App\Repositories\MedicoEspecialidadRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;
use App\Models\MedicoEspecialidad;
use App\Models\Medico;
use App\Models\Especialidad;

class MedicoEspecialidadController extends AppBaseController
{
    /** @var  Medico_EspecialidadRepository */
    private $medicoEspecialidadRepository;

    public function __construct(MedicoEspecialidadRepository $medicoEspecialidadRepo)
    {
        $this->medicoEspecialidadRepository = $medicoEspecialidadRepo;
    }

    /**
     * Display a listing of the Medico_Especialidad.
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {  
        $this->medicoEspecialidadRepository->pushCriteria(new RequestCriteria($request));
        $medicoEspecialidads = $this->medicoEspecialidadRepository->all();

        // si la solicitud es a través de ajax     
        if ($request->ajax()) {
            // si la operacion es para validar la existencia de una asignacion determinada
            if ($request{"operacion"} == "validar") {
                // y si la asignacion existe
                if (MedicoEspecialidad::where("id_medico","=",$request{"id_medico"})
                    ->where("id_especialidad","=",$request{"id_especialidad"})->first()) {
                    return response()->json(1);
                } else {
                    return response()->json(0);
                }
            }
            // guardar datos de interes
            foreach ($medicoEspecialidads as &$key) {
                $key['dni_medico']          = $key->medico->dni;
                $key['nombre_medico']       = $key->medico->nombre;
                $key['nombre_especialidad'] = $key->especialidad->nombre;
            }
            // retornar data en formato json
            return response()->json($medicoEspecialidads);        
        } 

        // retornar vista con el objeto obtenido
        return view('medico_especialidads.index')
            ->with('medicoEspecialidads', $medicoEspecialidads);
    }

    /**
     * Show the form for creating a new Medico_Especialidad.
     *
     * @return Response
     */
    public function create()
    {        
        $medicos       = Medico::pluck('nombre', 'id');
        $especialidads = Especialidad::pluck('nombre', 'id');

        return view('medico_especialidads.create', compact('medicos', 'especialidads'));    
    }

    /**
     * Store a newly created Medico_Especialidad in storage.
     *
     * @param CreateMedicoEspecialidadRequest $request
     *
     * @return Response
     */
    public function store(CreateMedicoEspecialidadRequest $request)
    { 
        $input = $request->all();

        if ($medicoEspecialidad = $this->medicoEspecialidadRepository->create($input)) {
            // si la solicitud es a través de ajax     
            if ($request->ajax()) {
                // retornar true
                return response()->json(1);        
            }        

            Flash::success('Medico Especialidad saved successfully.');            
        } else {
            Flash::error('Medico Especialidad not saved successfully');
        }

        return redirect(route('medicoEspecialidads.index'));
    }

    /**
     * Display the specified Medico_Especialidad.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $medicoEspecialidad = $this->medicoEspecialidadRepository->findWithoutFail($id);

        if (empty($medicoEspecialidad)) {
            Flash::error('Medico Especialidad not found');

            return redirect(route('medicoEspecialidads.index'));
        }

        return view('medico_especialidads.show')->with('medicoEspecialidad', $medicoEspecialidad);
    }

    /**
     * Show the form for editing the specified Medico_Especialidad.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $medicoEspecialidad = $this->medicoEspecialidadRepository->findWithoutFail($id);

        if (empty($medicoEspecialidad)) {
            Flash::error('Medico Especialidad not found');

            return redirect(route('medicoEspecialidads.index'));
        }

        return view('medico_especialidads.edit')->with('medicoEspecialidad', $medicoEspecialidad);
    }

    /**
     * Update the specified Medico_Especialidad in storage.
     *
     * @param  int              $id
     * @param UpdateMedicoEspecialidadRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateMedicoEspecialidadRequest $request)
    { 
        $medicoEspecialidad = $this->medicoEspecialidadRepository->findWithoutFail($id);

        if (empty($medicoEspecialidad)) {
            // si la solicitud es a través de ajax     
            if ($request->ajax()) {
                // retornar false
                return response()->json(0);        
            }   
            Flash::error('Medico Especialidad not found');

            return redirect(route('medicoEspecialidads.index'));
        }

        
        // si se actualizo correctamente
        if ($medicoEspecialidad = $this->medicoEspecialidadRepository->update($request->all(), $id)) {
            // si la solicitud es a través de ajax     
            if ($request->ajax()) {
                // retornar true
                return response()->json(1);        
            }  
            Flash::success('Medico Especialidad updated successfully.');           
        } else {
            Flash::error('Medico Especialidad not updated successfully');
        }
        
        return redirect(route('medicoEspecialidads.index'));
    }

    /**
     * Remove the specified Medico_Especialidad from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy(Request $request, $id)
    { 
        $medicoEspecialidad = $this->medicoEspecialidadRepository->findWithoutFail($id);     

        if (empty($medicoEspecialidad)) {
            // si la solicitud es a través de ajax     
            if ($request->ajax()) {
                // retornar false
                return response()->json(0);        
            }   
            Flash::error('Medico Especialidad not found');
        }

        // si se elimino correctamente
        if ($this->medicoEspecialidadRepository->delete($id)) {
            // si la solicitud es a través de ajax     
            if ($request->ajax()) {
                // retornar true
                return response()->json(1);        
            }  
            Flash::success('Medico Especialidad deleted successfully.');           
        } else {
            Flash::error('Medico Especialidad not deleted successfully');
        }
        
        return redirect(route('medicoEspecialidads.index'));
    }
}
