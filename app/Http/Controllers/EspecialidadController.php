<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateEspecialidadRequest;
use App\Http\Requests\UpdateEspecialidadRequest;
use App\Repositories\EspecialidadRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

class EspecialidadController extends AppBaseController
{
    /** @var  EspecialidadRepository */
    private $especialidadRepository;

    public function __construct(EspecialidadRepository $especialidadRepo)
    {
        $this->especialidadRepository = $especialidadRepo;
    }

    /**
     * Display a listing of the Especialidad.
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->especialidadRepository->pushCriteria(new RequestCriteria($request));
        $especialidads = $this->especialidadRepository->all();

        // si la solicitud es a través de ajax     
        if ($request->ajax()) {
            // retornar data en formato json
            return response()->json($especialidads); 
        }

        return view('especialidads.index')
            ->with('especialidads', $especialidads);
    }

    /**
     * Show the form for creating a new Especialidad.
     *
     * @return Response
     */
    public function create()
    {
        return view('especialidads.create');
    }

    /**
     * Store a newly created Especialidad in storage.
     *
     * @param CreateEspecialidadRequest $request
     *
     * @return Response
     */
    public function store(CreateEspecialidadRequest $request)
    {
        $input = $request->all();

        $especialidad = $this->especialidadRepository->create($input);

        Flash::success('Especialidad saved successfully.');

        return redirect(route('especialidads.index'));
    }

    /**
     * Display the specified Especialidad.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $especialidad = $this->especialidadRepository->findWithoutFail($id);

        if (empty($especialidad)) {
            Flash::error('Especialidad not found');

            return redirect(route('especialidads.index'));
        }

        return view('especialidads.show')->with('especialidad', $especialidad);
    }

    /**
     * Show the form for editing the specified Especialidad.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $especialidad = $this->especialidadRepository->findWithoutFail($id);

        if (empty($especialidad)) {
            Flash::error('Especialidad not found');

            return redirect(route('especialidads.index'));
        }

        return view('especialidads.edit')->with('especialidad', $especialidad);
    }

    /**
     * Update the specified Especialidad in storage.
     *
     * @param  int              $id
     * @param UpdateEspecialidadRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateEspecialidadRequest $request)
    {
        $especialidad = $this->especialidadRepository->findWithoutFail($id);

        if (empty($especialidad)) {
            Flash::error('Especialidad not found');

            return redirect(route('especialidads.index'));
        }

        $especialidad = $this->especialidadRepository->update($request->all(), $id);

        Flash::success('Especialidad updated successfully.');

        return redirect(route('especialidads.index'));
    }

    /**
     * Remove the specified Especialidad from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $especialidad = $this->especialidadRepository->findWithoutFail($id);

        if (empty($especialidad)) {
            Flash::error('Especialidad not found');

            return redirect(route('especialidads.index'));
        }

        $this->especialidadRepository->delete($id);

        Flash::success('Especialidad deleted successfully.');

        return redirect(route('especialidads.index'));
    }
}
