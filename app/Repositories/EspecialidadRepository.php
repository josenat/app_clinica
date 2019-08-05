<?php

namespace App\Repositories;

use App\Models\Especialidad;
use InfyOm\Generator\Common\BaseRepository;

/**
 * Class EspecialidadRepository
 * @package App\Repositories
 * @version August 4, 2019, 10:21 pm UTC
 *
 * @method Especialidad findWithoutFail($id, $columns = ['*'])
 * @method Especialidad find($id, $columns = ['*'])
 * @method Especialidad first($columns = ['*'])
*/
class EspecialidadRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'nombre',
        'descripcion'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return Especialidad::class;
    }
}
