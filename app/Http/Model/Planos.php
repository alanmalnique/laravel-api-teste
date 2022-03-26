<?php

namespace App\Http\Model;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int $plan_id
 * @property int $arq_id
 * @property string $plan_titulo
 * @property string $plan_resumo
 * @property string $plan_descricao
 * @property float $plan_valor
 * @property boolean $plan_ativo
 * @property TblArquivo $tblArquivo
 * @property TblAluno[] $tblAlunos
 * @property TblTransacao[] $tblTransacaos
 */
class Planos extends Model
{
    /**
     * The table associated with the model.
     * 
     * @var string
     */
    protected $table = 'tbl_planos';

    /**
     * The primary key for the model.
     * 
     * @var string
     */
    protected $primaryKey = 'plan_id';

    /**
     * Ignoring timestamps.
     * 
     * @var string
     */
    public $timestamps = false;

    /**
     * @var array
     */
    protected $fillable = ['arq_id', 'plan_titulo', 'plan_resumo', 'plan_descricao', 'plan_valor', 'plan_ativo'];

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
    public function alunos()
    {
        return $this->hasMany('App\Http\Model\Aluno', 'plan_id', 'plan_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function transacoes()
    {
        return $this->hasMany('App\Http\Model\Transacao', 'plan_id', 'plan_id');
    }
}
