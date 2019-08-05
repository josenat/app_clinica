<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Medico_Especialidad
 * @package App\Models
 * @version August 4, 2019, 10:45 pm UTC
 *
 * @property integer id_especialidad
 * @property integer id_medico
 */
class MedicoEspecialidad extends Model
{
    use SoftDeletes;

    public $table = 'medico__especialidads';
    

    protected $dates = ['deleted_at'];


    public $fillable = [
        'id_especialidad',
        'id_medico'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'id_especialidad' => 'integer',
        'id_medico' => 'integer'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'id_especialidad' => 'required',
        'id_medico' => 'required'
    ];

    public function medico()
    {
        return $this->belongsTo('App\Models\Medico', 'id_medico', 'id');
    }    

    public function especialidad()
    {
        return $this->belongsTo('App\Models\Especialidad', 'id_especialidad', 'id');
    }            
}
