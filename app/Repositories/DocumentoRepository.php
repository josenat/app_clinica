<?php

namespace App\Repositories;

use App\Models\Documento;
use InfyOm\Generator\Common\BaseRepository;

/**
 * Class DocumentoRepository
 * @package App\Repositories
 * @version August 5, 2019, 4:02 pm UTC
 *
 * @method Documento findWithoutFail($id, $columns = ['*'])
 * @method Documento find($id, $columns = ['*'])
 * @method Documento first($columns = ['*'])
*/
class DocumentoRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'id_consulta',
        'path'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return Documento::class;
    }
}
