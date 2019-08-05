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
        'id_documento'       
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
        'path' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'id_paciente_med' => 'required',
        'id_enfermedad' => 'required',
        'motivo' => 'required'
    ];   

    public function enfermedad()
    {
        return $this->belongsTo('App\Models\Enfermedad', 'id_enfermedad', 'id');
    } 

    public function documentos()
    {
        return $this->hasMany('App\Models\Documento', 'id_consulta', 'id');
    }            
}
