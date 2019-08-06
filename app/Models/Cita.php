<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Cita
 * @package App\Models
 * @version August 4, 2019, 11:31 pm UTC
 *
 * @property integer id_paciente_med
 * @property timestamps fecha_cita
 * @property string observacion
 */
class Cita extends Model
{
    use SoftDeletes;

    public $table = 'citas';
    

    protected $dates = ['deleted_at'];


    public $fillable = [
        'id_paciente_med',
        'fecha_cita',
        'hora_cita',
        'observacion'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'id_paciente_med' => 'integer',
        'observacion' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [ 
        'fecha_cita' => 'required'
    ];

    public function getFechaCitaAttribute($date)
    {
        // si no será leído por DataTables JS puede usar el siguiente código:
        return \Carbon\Carbon::parse($date)->format('d-m-Y'); // devolverá: d-m-Y 
    }     

    public function paciente_medico()
    {
        return $this->belongsTo('App\Models\PacienteMedico', 'id_paciente_med', 'id');
    }        
}
