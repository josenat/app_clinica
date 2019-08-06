<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Medico
 * @package App\Models
 * @version August 4, 2019, 10:12 pm UTC
 *
 * @property string nombre
 * @property string apellido
 * @property string direccion
 * @property integer contrato
 */
class Medico extends Model
{
    use SoftDeletes;

    public $table = 'medicos';
    

    protected $dates = ['deleted_at'];


    public $fillable = [
        'dni',
        'nombre',
        'apellido',
        'direccion',
        'contrato'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'dni' => 'string',
        'nombre' => 'string',
        'apellido' => 'string',
        'direccion' => 'string',
        'contrato' => 'integer'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'dni' => 'required',
        'nombre' => 'required',
        'apellido' => 'required',
        'contrato' => 'required'
    ];

    public function pacientes()
    {
        return $this->hasMany('App\Models\PacienteMedico', 'id_medico', 'id');
    }  

    public function especialidades()
    {
        return $this->hasMany('App\Models\Especialidad', 'id_especialidad', 'id');
    }         
}
