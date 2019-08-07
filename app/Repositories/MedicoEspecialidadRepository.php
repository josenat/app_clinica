<?php

namespace App\Repositories;

use App\Models\MedicoEspecialidad;
use InfyOm\Generator\Common\BaseRepository;

/**
 * Class Medico_EspecialidadRepository
 * @package App\Repositories
 * @version August 4, 2019, 10:45 pm UTC
 *
 * @method Medico_Especialidad findWithoutFail($id, $columns = ['*'])
 * @method Medico_Especialidad find($id, $columns = ['*'])
 * @method Medico_Especialidad first($columns = ['*'])
*/
class MedicoEspecialidadRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'id_medico',
        'id_especialidad'
        
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return MedicoEspecialidad::class;
    }
}
