<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateMedico_EspecialidadRequest;
use App\Http\Requests\UpdateMedico_EspecialidadRequest;
use App\Repositories\Medico_EspecialidadRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

class MedicoEspecialidadController extends AppBaseController
{
    /** @var  Medico_EspecialidadRepository */
    private $medicoEspecialidadRepository;

    public function __construct(Medico_EspecialidadRepository $medicoEspecialidadRepo)
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
        return view('medico_especialidads.create');
    }

    /**
     * Store a newly created Medico_Especialidad in storage.
     *
     * @param CreateMedico_EspecialidadRequest $request
     *
     * @return Response
     */
    public function store(CreateMedico_EspecialidadRequest $request)
    {
        $input = $request->all();

        $medicoEspecialidad = $this->medicoEspecialidadRepository->create($input);

        Flash::success('Medico  Especialidad saved successfully.');

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
            Flash::error('Medico  Especialidad not found');

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
            Flash::error('Medico  Especialidad not found');

            return redirect(route('medicoEspecialidads.index'));
        }

        return view('medico_especialidads.edit')->with('medicoEspecialidad', $medicoEspecialidad);
    }

    /**
     * Update the specified Medico_Especialidad in storage.
     *
     * @param  int              $id
     * @param UpdateMedico_EspecialidadRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateMedico_EspecialidadRequest $request)
    {
        $medicoEspecialidad = $this->medicoEspecialidadRepository->findWithoutFail($id);

        if (empty($medicoEspecialidad)) {
            Flash::error('Medico  Especialidad not found');

            return redirect(route('medicoEspecialidads.index'));
        }

        $medicoEspecialidad = $this->medicoEspecialidadRepository->update($request->all(), $id);

        Flash::success('Medico  Especialidad updated successfully.');

        return redirect(route('medicoEspecialidads.index'));
    }

    /**
     * Remove the specified Medico_Especialidad from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $medicoEspecialidad = $this->medicoEspecialidadRepository->findWithoutFail($id);

        if (empty($medicoEspecialidad)) {
            Flash::error('Medico  Especialidad not found');

            return redirect(route('medicoEspecialidads.index'));
        }

        $this->medicoEspecialidadRepository->delete($id);

        Flash::success('Medico  Especialidad deleted successfully.');

        return redirect(route('medicoEspecialidads.index'));
    }
}
