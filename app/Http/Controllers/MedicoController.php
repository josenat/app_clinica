<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateMedicoRequest;
use App\Http\Requests\UpdateMedicoRequest;
use App\Repositories\MedicoRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

class MedicoController extends AppBaseController
{
    /** @var  MedicoRepository */
    private $medicoRepository;

    private $contratos = ['TEMPORAL' => 1, 'PERMANENTE' => 2];

    public function __construct(MedicoRepository $medicoRepo)
    {
        $this->medicoRepository = $medicoRepo;
    }

    /**
     * Display a listing of the Medico.
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->medicoRepository->pushCriteria(new RequestCriteria($request));
        $medicos = $this->medicoRepository->all();        
 
        return view('medicos.index', compact('medicos'));
    }

    /**
     * Show the form for creating a new Medico.
     *
     * @return Response
     */
    public function create()
    {
        $contratos = array_flip($this->contratos);

        return view('medicos.create', compact('contratos'));
    }

    /**
     * Store a newly created Medico in storage.
     *
     * @param CreateMedicoRequest $request
     *
     * @return Response
     */
    public function store(CreateMedicoRequest $request)
    {
        $input = $request->all();

        $medico = $this->medicoRepository->create($input);

        Flash::success('Medico saved successfully.');

        return redirect(route('medicos.index'));
    }

    /**
     * Display the specified Medico.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $medico = $this->medicoRepository->findWithoutFail($id);

        if (empty($medico)) {
            Flash::error('Medico not found');

            return redirect(route('medicos.index'));
        }

        $contrato = array_search($medico->contrato, $this->contratos, false);

        return view('medicos.show', compact('medico', 'contrato'));
    }

    /**
     * Show the form for editing the specified Medico.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $medico = $this->medicoRepository->findWithoutFail($id);

        if (empty($medico)) {
            Flash::error('Medico not found');

            return redirect(route('medicos.index'));
        }

        // intercambiar clave-valor arreglo 
        $array = array_flip($this->contratos); 
        // obtener nombre de contrato del medico
        $nombre_contrato = array_search($medico->contrato, $this->contratos, false);        
        // crear nuevo arreglo que como primer lugar tenga los datos del medico (input selected) 
        $contratos  = [$medico->contrato => $nombre_contrato]; 
        // eliminar elemento del arreglo original para evitar que se repita en el nuevo arreglo
        unset($array[$medico->contrato]); 
        // insertar en el nuevo arreglo los datos restantes del arreglo original
        foreach ($array as $key => $value) {
            $contratos[$key] = $value;
        }

        return view('medicos.edit', compact('medico', 'contratos'));
    }

    /**
     * Update the specified Medico in storage.
     *
     * @param  int              $id
     * @param UpdateMedicoRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateMedicoRequest $request)
    {
        $medico = $this->medicoRepository->findWithoutFail($id);

        if (empty($medico)) {
            Flash::error('Medico not found');

            return redirect(route('medicos.index'));
        }

        $medico = $this->medicoRepository->update($request->all(), $id);

        Flash::success('Medico updated successfully.');

        return redirect(route('medicos.index'));
    }

    /**
     * Remove the specified Medico from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $medico = $this->medicoRepository->findWithoutFail($id);

        if (empty($medico)) {
            Flash::error('Medico not found');

            return redirect(route('medicos.index'));
        }

        $this->medicoRepository->delete($id);

        Flash::success('Medico deleted successfully.');

        return redirect(route('medicos.index'));
    }
}
