<?php

namespace App\Repositories;

use App\Models\Consulta;
use InfyOm\Generator\Common\BaseRepository;

/**
 * Class ConsultaRepository
 * @package App\Repositories
 * @version August 4, 2019, 11:29 pm UTC
 *
 * @method Consulta findWithoutFail($id, $columns = ['*'])
 * @method Consulta find($id, $columns = ['*'])
 * @method Consulta first($columns = ['*'])
*/
class ConsultaRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'id_paciente_med',
        'id_enfermedad',
        'motivo',
        'tratamiento'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return Consulta::class;
    }
}
