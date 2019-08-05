<?php

namespace App\Repositories;

use App\Models\Diagnostico;
use InfyOm\Generator\Common\BaseRepository;

/**
 * Class DiagnosticoRepository
 * @package App\Repositories
 * @version August 4, 2019, 10:41 pm UTC
 *
 * @method Diagnostico findWithoutFail($id, $columns = ['*'])
 * @method Diagnostico find($id, $columns = ['*'])
 * @method Diagnostico first($columns = ['*'])
*/
class DiagnosticoRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'id_paciente_med',
        'id_enfermedad',
        'descripcion'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return Diagnostico::class;
    }
}
