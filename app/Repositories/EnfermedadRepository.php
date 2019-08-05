<?php

namespace App\Repositories;

use App\Models\Enfermedad;
use InfyOm\Generator\Common\BaseRepository;

/**
 * Class EnfermedadRepository
 * @package App\Repositories
 * @version August 4, 2019, 10:04 pm UTC
 *
 * @method Enfermedad findWithoutFail($id, $columns = ['*'])
 * @method Enfermedad find($id, $columns = ['*'])
 * @method Enfermedad first($columns = ['*'])
*/
class EnfermedadRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'nombre',
        'sistema'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return Enfermedad::class;
    }
}
