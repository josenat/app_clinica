<?php

namespace App\Repositories;

use App\Models\PacienteMedico;
use InfyOm\Generator\Common\BaseRepository;

/**
 * Class Paciente_MedicoRepository
 * @package App\Repositories
 * @version August 4, 2019, 10:44 pm UTC
 *
 * @method Paciente_Medico findWithoutFail($id, $columns = ['*'])
 * @method Paciente_Medico find($id, $columns = ['*'])
 * @method Paciente_Medico first($columns = ['*'])
*/
class PacienteMedicoRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'id_paciente',
        'id_medico'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return PacienteMedico::class;
    }
}
