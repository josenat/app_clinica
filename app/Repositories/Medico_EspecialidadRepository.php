<?php

namespace App\Repositories;

use App\Models\Medico_Especialidad;
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
class Medico_EspecialidadRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'id_especialidad',
        'id_medico'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return Medico_Especialidad::class;
    }
}
