<?php

namespace App\Http\Model;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int $regev_id
 * @property int $alu_id
 * @property int $arq_id
 * @property string $regev_descricao
 * @property string $regev_datahora
 * @property TblAluno $tblAluno
 * @property TblArquivo $tblArquivo
 */
class RegistroEvolutivo extends Model
{
    /**
     * The table associated with the model.
     * 
     * @var string
     */
    protected $table = 'tbl_registroevolutivo';

    /**
     * The primary key for the model.
     * 
     * @var string
     */
    protected $primaryKey = 'regev_id';

    /**
     * Ignoring timestamps.
     * 
     * @var string
     */
    public $timestamps = false;

    /**
     * @var array
     */
    protected $fillable = ['alu_id', 'arq_id', 'regev_descricao', 'regev_datahora'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function aluno()
    {
        return $this->belongsTo('App\Http\Model\Aluno', 'alu_id', 'alu_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function arquivo()
    {
        return $this->belongsTo('App\Http\Model\Arquivo', 'arq_id', 'arq_id');
    }
}
