<?php

namespace App\Repositories;

use App\Models\Medico;
use InfyOm\Generator\Common\BaseRepository;

/**
 * Class MedicoRepository
 * @package App\Repositories
 * @version August 4, 2019, 10:12 pm UTC
 *
 * @method Medico findWithoutFail($id, $columns = ['*'])
 * @method Medico find($id, $columns = ['*'])
 * @method Medico first($columns = ['*'])
*/
class MedicoRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'dni',
        'nombre',
        'apellido',
        'direccion',
        'contrato'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return Medico::class;
    }
}
