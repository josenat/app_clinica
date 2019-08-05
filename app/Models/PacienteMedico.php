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

    public function paciente()
    {
        return $this->belongsTo('App\Models\Paciente', 'id_paciente', 'id');
    }   

    public function medico()
    {
        return $this->belongsTo('App\Models\Medico', 'id_medico', 'id');
    }     

    public function consultas()
    {
        return $this->hasMany('App\Models\Consulta', 'id_paciente_med', 'id');
    }         

    public function citas()
    {
        return $this->hasMany('App\Models\Cita', 'id_paciente_med', 'id');
    }           
}
