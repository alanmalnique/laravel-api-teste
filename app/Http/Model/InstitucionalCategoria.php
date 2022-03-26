<?php

namespace App\Http\Model;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int $instc_id
 * @property int $arq_id
 * @property string $instc_titulo
 * @property boolean $instc_ativo
 * @property boolean $instc_relevancia
 * @property string $instc_resumo
 * @property TblArquivo $tblArquivo
 * @property TblInstitucional[] $tblInstitucionals
 */
class InstitucionalCategoria extends Model
{
    /**
     * The table associated with the model.
     * 
     * @var string
     */
    protected $table = 'tbl_institucionalcategoria';

    /**
     * The primary key for the model.
     * 
     * @var string
     */
    protected $primaryKey = 'instc_id';

    /**
     * Ignoring timestamps.
     * 
     * @var string
     */
    public $timestamps = false;

    /**
     * @var array
     */
    protected $fillable = ['arq_id', 'instc_titulo', 'instc_ativo', 'instc_relevancia', 'instc_resumo'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function arquivo()
    {
        return $this->belongsTo('App\Http\Model\Arquivo', 'arq_id', 'arq_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function institucionais()
    {
        return $this->hasMany('App\Http\Model\Institucional', 'instc_id', 'instc_id');
    }
}
