<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Enfermedad
 * @package App\Models
 * @version August 4, 2019, 10:04 pm UTC
 *
 * @property string nombre
 * @property string sistema
 */
class Enfermedad extends Model
{
    use SoftDeletes;

    public $table = 'enfermedads';
    

    protected $dates = ['deleted_at'];


    public $fillable = [
        'nombre',
        'sistema'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'nombre' => 'string',
        'sistema' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'nombre' => 'required'
    ];

    public function consultas()
    {
        return $this->hasMany('App\Models\Consulta', 'id_enfermedad', 'id');
    }
    
}
