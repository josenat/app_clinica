<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Especialidad
 * @package App\Models
 * @version August 4, 2019, 10:21 pm UTC
 *
 * @property string nombre
 * @property string descripcion
 */
class Especialidad extends Model
{
    use SoftDeletes;

    public $table = 'especialidads';
    

    protected $dates = ['deleted_at'];


    public $fillable = [
        'nombre',
        'descripcion'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'nombre' => 'string',
        'descripcion' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'nombre' => 'required'
    ];

    public function medicos()
    {
        return $this->hasMany('App\Models\Medico', 'id_medico', 'id');
    }      
}
