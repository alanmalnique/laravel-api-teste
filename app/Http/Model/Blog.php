<?php

namespace App\Http\Model;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int $blog_id
 * @property int $parc_id
 * @property int $arq_id
 * @property string $blog_titulo
 * @property boolean $blog_ativo
 * @property string $blog_resumo
 * @property string $blog_texto
 * @property string $blog_datahora
 * @property TblArquivo $tblArquivo
 * @property TblParceiro $tblParceiro
 */
class Blog extends Model
{
    /**
     * The table associated with the model.
     * 
     * @var string
     */
    protected $table = 'tbl_blog';

    /**
     * The primary key for the model.
     * 
     * @var string
     */
    protected $primaryKey = 'blog_id';

    /**
     * Ignoring timestamps.
     * 
     * @var string
     */
    public $timestamps = false;

    /**
     * @var array
     */
    protected $fillable = ['parc_id', 'arq_id', 'blog_titulo', 'blog_ativo', 'blog_resumo', 'blog_texto', 'blog_datahora'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function arquivo()
    {
        return $this->belongsTo('App\Http\Model\Arquivo', 'arq_id', 'arq_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function parceiro()
    {
        return $this->belongsTo('App\Http\Model\Parceiros', 'parc_id', 'parc_id');
    }
}
