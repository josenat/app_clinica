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

    public $table = 'medico_especialidads';
    

    protected $dates = ['deleted_at'];


    public $fillable = [
        'id_medico',
        'id_especialidad'
        
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',        
        'id_medico' => 'integer',
        'id_especialidad' => 'integer'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'id_medico' => 'required',
        'id_especialidad' => 'required'        
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
