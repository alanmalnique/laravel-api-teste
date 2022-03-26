<?php

namespace App\Http\Model;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int $parc_id
 * @property int $arq_id
 * @property string $parc_nome
 * @property string $parc_descricao
 * @property string $parc_link
 * @property TblArquivo $tblArquivo
 * @property TblBlog[] $tblBlogs
 */
class Parceiros extends Model
{
    /**
     * The table associated with the model.
     * 
     * @var string
     */
    protected $table = 'tbl_parceiros';

    /**
     * The primary key for the model.
     * 
     * @var string
     */
    protected $primaryKey = 'parc_id';

    /**
     * Ignoring timestamps.
     * 
     * @var string
     */
    public $timestamps = false;

    /**
     * @var array
     */
    protected $fillable = ['arq_id', 'parc_nome', 'parc_descricao', 'parc_link'];

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
    public function blogs()
    {
        return $this->hasMany('App\Http\Model\Blog', 'parc_id', 'parc_id');
    }
}
