<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateEnfermedadRequest;
use App\Http\Requests\UpdateEnfermedadRequest;
use App\Repositories\EnfermedadRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

class EnfermedadController extends AppBaseController
{
    /** @var  EnfermedadRepository */
    private $enfermedadRepository;

    public function __construct(EnfermedadRepository $enfermedadRepo)
    {
        $this->enfermedadRepository = $enfermedadRepo;
    }

    /**
     * Display a listing of the Enfermedad.
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->enfermedadRepository->pushCriteria(new RequestCriteria($request));
        $enfermedads = $this->enfermedadRepository->all();

        return view('enfermedads.index')
            ->with('enfermedads', $enfermedads);
    }

    /**
     * Show the form for creating a new Enfermedad.
     *
     * @return Response
     */
    public function create()
    {
        return view('enfermedads.create');
    }

    /**
     * Store a newly created Enfermedad in storage.
     *
     * @param CreateEnfermedadRequest $request
     *
     * @return Response
     */
    public function store(CreateEnfermedadRequest $request)
    {
        $request{'nombre'}  = strtoupper($request{'nombre'}); 
        
        $input = $request->all();

        $enfermedad = $this->enfermedadRepository->create($input);

        Flash::success('Enfermedad saved successfully.');

        return redirect(route('enfermedads.index'));
    }

    /**
     * Display the specified Enfermedad.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $enfermedad = $this->enfermedadRepository->findWithoutFail($id);

        if (empty($enfermedad)) {
            Flash::error('Enfermedad not found');

            return redirect(route('enfermedads.index'));
        }

        return view('enfermedads.show')->with('enfermedad', $enfermedad);
    }

    /**
     * Show the form for editing the specified Enfermedad.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $enfermedad = $this->enfermedadRepository->findWithoutFail($id);

        if (empty($enfermedad)) {
            Flash::error('Enfermedad not found');

            return redirect(route('enfermedads.index'));
        }

        return view('enfermedads.edit')->with('enfermedad', $enfermedad);
    }

    /**
     * Update the specified Enfermedad in storage.
     *
     * @param  int              $id
     * @param UpdateEnfermedadRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateEnfermedadRequest $request)
    {
        $enfermedad = $this->enfermedadRepository->findWithoutFail($id);

        if (empty($enfermedad)) {
            Flash::error('Enfermedad not found');

            return redirect(route('enfermedads.index'));
        }

        $enfermedad = $this->enfermedadRepository->update($request->all(), $id);

        Flash::success('Enfermedad updated successfully.');

        return redirect(route('enfermedads.index'));
    }

    /**
     * Remove the specified Enfermedad from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $enfermedad = $this->enfermedadRepository->findWithoutFail($id);

        if (empty($enfermedad)) {
            Flash::error('Enfermedad not found');

            return redirect(route('enfermedads.index'));
        }

        $this->enfermedadRepository->delete($id);

        Flash::success('Enfermedad deleted successfully.');

        return redirect(route('enfermedads.index'));
    }
}
