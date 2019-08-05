<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Paciente_Medico
 * @package App\Models
 * @version August 4, 2019, 10:44 pm UTC
 *
 * @property integer id_paciente
 * @property integer id_medico
 */
class PacienteMedico extends Model
{
    use SoftDeletes;

    public $table = 'paciente__medicos';
    

    protected $dates = ['deleted_at'];


    public $fillable = [
        'id_paciente',
        'id_medico'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'id_paciente' => 'integer',
        'id_medico' => 'integer'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'id_paciente' => 'required',
        'id_medico' => 'required'
    ];

    
}
