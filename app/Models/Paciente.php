<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Paciente
 * @package App\Models
 * @version August 4, 2019, 10:15 pm UTC
 *
 * @property string nombre
 * @property string apellido
 * @property string fecha_nac
 * @property string direccion 
 */
class Paciente extends Model
{
    use SoftDeletes;

    public $table = 'pacientes';
    

    protected $dates = ['deleted_at'];


    public $fillable = [
        'dni',
        'nombre',
        'apellido',
        'fecha_nac',
        'direccion'
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
        'fecha_nac' => 'date',
        'direccion' => 'string'
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
        'fecha_nac' => 'required'
    ];

    public function getFechaNacAttribute($date)
    {
        // si no será leído por DataTables JS puede usar el siguiente código:
        return \Carbon\Carbon::parse($date)->format('d-m-Y'); // devolverá: d-m-Y 
    } 

    public function medicos()
    {
        return $this->hasMany('App\Models\PacienteMedico', 'id_paciente', 'id');
    }    
}
