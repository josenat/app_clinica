<?php

namespace App\Repositories;

use App\Models\Paciente;
use InfyOm\Generator\Common\BaseRepository;

/**
 * Class PacienteRepository
 * @package App\Repositories
 * @version August 4, 2019, 10:15 pm UTC
 *
 * @method Paciente findWithoutFail($id, $columns = ['*'])
 * @method Paciente find($id, $columns = ['*'])
 * @method Paciente first($columns = ['*'])
*/
class PacienteRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'nombre',
        'apellido',
        'fecha_nac',
        'direccion'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return Paciente::class;
    }
}
