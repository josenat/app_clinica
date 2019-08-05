<?php

namespace App\Repositories;

use App\Models\Cita;
use InfyOm\Generator\Common\BaseRepository;

/**
 * Class CitaRepository
 * @package App\Repositories
 * @version August 4, 2019, 11:31 pm UTC
 *
 * @method Cita findWithoutFail($id, $columns = ['*'])
 * @method Cita find($id, $columns = ['*'])
 * @method Cita first($columns = ['*'])
*/
class CitaRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'id_paciente_med',
        'fecha_cita',
        'observacion'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return Cita::class;
    }
}
