<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Documento
 * @package App\Models
 * @version August 5, 2019, 4:02 pm UTC
 *
 * @property integer id_consulta
 * @property string path
 */
class Documento extends Model
{
    use SoftDeletes;

    public $table = 'documentos';
    

    protected $dates = ['deleted_at'];


    public $fillable = [
        'id_consulta',
        'path'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'id_consulta' => 'integer',
        'path' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'id_consulta' => 'required',
        'path' => 'required'
    ];

    /**
     * Subir archivos
     */
    public function setPathAttribute($path)
    {
        // si se ha seleccionado un archivo
        if (is_file($path)) {
            // obtenemos la extensión de archivo original
            $ext = \File::extension($path->getClientOriginalName());
            // creamos un nuevo nombre de archivo de la siguiente forma
            $name = $this->attributes['id_paciente_med'] . '.' . $ext;
            // guardamos en base datos el nuevo nombre de archivo
            $this->attributes['path'] = $name;
            // y luego guardamos el archivo en local
            \Storage::disk('documents')->put($name, \File::get($path));            
        
        } else {
            $this->attributes['path'] = 'NULL';
        }
    }  

    public function consulta()
    {
        return $this->belongsTo('App\Models\Consulta', 'id_consulta', 'id');
    }        
}
