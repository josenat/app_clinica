<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Consulta
 * @package App\Models
 * @version August 4, 2019, 11:29 pm UTC
 *
 * @property integer id_paciente_med
 * @property integer id_enfermedad
 * @property string motivo
 * @property string tratamiento
 */
class Consulta extends Model
{
    use SoftDeletes;

    public $table = 'consultas';
    

    protected $dates = ['deleted_at'];


    public $fillable = [
        'id_paciente_med',
        'id_enfermedad',
        'motivo',
        'tratamiento', 
        'id_documento',
        'created_at',       
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'id_paciente_med' => 'integer',
        'id_enfermedad' => 'integer',
        'motivo' => 'string',
        'tratamiento' => 'string',
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'motivo' => 'required'
    ];     

    public function getCreatedAtAttribute($date)
    {
        // si no será leído por DataTables JS puede usar el siguiente código:
        return \Carbon\Carbon::parse($date)->format('d-m-Y'); // devolverá: d-m-Y 
    }  

    public function paciente_medico()
    {
        return $this->belongsTo('App\Models\PacienteMedico', 'id_paciente_med', 'id');
    }           

    public function enfermedad()
    {
        return $this->belongsTo('App\Models\Enfermedad', 'id_enfermedad', 'id');
    } 

    public function documentos()
    {
        return $this->hasMany('App\Models\Documento', 'id_consulta', 'id');
    }            
}
