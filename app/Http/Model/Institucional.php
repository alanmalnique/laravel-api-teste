<?php

namespace App\Http\Model;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int $inst_id
 * @property int $instc_id
 * @property string $inst_titulo
 * @property boolean $inst_ativo
 * @property boolean $inst_relevancia
 * @property string $inst_texto
 * @property TblInstitucionalcategorium $tblInstitucionalcategorium
 */
class Institucional extends Model
{
    /**
     * The table associated with the model.
     * 
     * @var string
     */
    protected $table = 'tbl_institucional';

    /**
     * The primary key for the model.
     * 
     * @var string
     */
    protected $primaryKey = 'inst_id';

    /**
     * Ignoring timestamps.
     * 
     * @var string
     */
    public $timestamps = false;

    /**
     * @var array
     */
    protected $fillable = ['instc_id', 'inst_titulo', 'inst_ativo', 'inst_relevancia', 'inst_texto'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function categoria()
    {
        return $this->belongsTo('App\Http\Model\InstitucionalCategoria', 'instc_id', 'instc_id');
    }
}
