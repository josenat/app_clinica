<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreatePaciente_MedicoRequest;
use App\Http\Requests\UpdatePaciente_MedicoRequest;
use App\Repositories\Paciente_MedicoRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

class PacienteMedicoController extends AppBaseController
{
    /** @var  Paciente_MedicoRepository */
    private $pacienteMedicoRepository;

    public function __construct(Paciente_MedicoRepository $pacienteMedicoRepo)
    {
        $this->pacienteMedicoRepository = $pacienteMedicoRepo;
    }

    /**
     * Display a listing of the Paciente_Medico.
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->pacienteMedicoRepository->pushCriteria(new RequestCriteria($request));
        $pacienteMedicos = $this->pacienteMedicoRepository->all();

        return view('paciente_medicos.index')
            ->with('pacienteMedicos', $pacienteMedicos);
    }

    /**
     * Show the form for creating a new Paciente_Medico.
     *
     * @return Response
     */
    public function create()
    {
        return view('paciente_medicos.create');
    }

    /**
     * Store a newly created Paciente_Medico in storage.
     *
     * @param CreatePaciente_MedicoRequest $request
     *
     * @return Response
     */
    public function store(CreatePaciente_MedicoRequest $request)
    {
        $input = $request->all();

        $pacienteMedico = $this->pacienteMedicoRepository->create($input);

        Flash::success('Paciente  Medico saved successfully.');

        return redirect(route('pacienteMedicos.index'));
    }

    /**
     * Display the specified Paciente_Medico.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $pacienteMedico = $this->pacienteMedicoRepository->findWithoutFail($id);

        if (empty($pacienteMedico)) {
            Flash::error('Paciente  Medico not found');

            return redirect(route('pacienteMedicos.index'));
        }

        return view('paciente_medicos.show')->with('pacienteMedico', $pacienteMedico);
    }

    /**
     * Show the form for editing the specified Paciente_Medico.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $pacienteMedico = $this->pacienteMedicoRepository->findWithoutFail($id);

        if (empty($pacienteMedico)) {
            Flash::error('Paciente  Medico not found');

            return redirect(route('pacienteMedicos.index'));
        }

        return view('paciente_medicos.edit')->with('pacienteMedico', $pacienteMedico);
    }

    /**
     * Update the specified Paciente_Medico in storage.
     *
     * @param  int              $id
     * @param UpdatePaciente_MedicoRequest $request
     *
     * @return Response
     */
    public function update($id, UpdatePaciente_MedicoRequest $request)
    {
        $pacienteMedico = $this->pacienteMedicoRepository->findWithoutFail($id);

        if (empty($pacienteMedico)) {
            Flash::error('Paciente  Medico not found');

            return redirect(route('pacienteMedicos.index'));
        }

        $pacienteMedico = $this->pacienteMedicoRepository->update($request->all(), $id);

        Flash::success('Paciente  Medico updated successfully.');

        return redirect(route('pacienteMedicos.index'));
    }

    /**
     * Remove the specified Paciente_Medico from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $pacienteMedico = $this->pacienteMedicoRepository->findWithoutFail($id);

        if (empty($pacienteMedico)) {
            Flash::error('Paciente  Medico not found');

            return redirect(route('pacienteMedicos.index'));
        }

        $this->pacienteMedicoRepository->delete($id);

        Flash::success('Paciente  Medico deleted successfully.');

        return redirect(route('pacienteMedicos.index'));
    }
}
