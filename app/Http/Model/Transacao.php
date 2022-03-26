<?php

namespace App\Http\Model;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int $tsc_id
 * @property int $alu_id
 * @property int $plan_id
 * @property string $tsc_datahora
 * @property string $tsc_cartaofinal
 * @property boolean $tsc_bandeira
 * @property float $tsc_valor
 * @property string $tsc_dthrpagto
 * @property string $tsc_dataprevrecimento
 * @property boolean $tsc_recebido
 * @property float $tsc_taxaadquirente
 * @property float $tsc_valoradquirente
 * @property float $tsc_valorrecebido
 * @property boolean $tsc_status
 * @property string $tsc_paymentid
 * @property TblPlano $tblPlano
 * @property TblAluno $tblAluno
 */
class Transacao extends Model
{
    /**
     * The table associated with the model.
     * 
     * @var string
     */
    protected $table = 'tbl_transacao';

    /**
     * The primary key for the model.
     * 
     * @var string
     */
    protected $primaryKey = 'tsc_id';

    /**
     * Ignoring timestamps.
     * 
     * @var string
     */
    public $timestamps = false;

    /**
     * @var array
     */
    protected $fillable = ['alu_id', 'plan_id', 'tsc_datahora', 'tsc_cartaofinal', 'tsc_bandeira', 'tsc_valor', 'tsc_dthrpagto', 'tsc_dataprevrecimento', 'tsc_recebido', 'tsc_taxaadquirente', 'tsc_valoradquirente', 'tsc_valorrecebido', 'tsc_status', 'tsc_paymentid'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function plano()
    {
        return $this->belongsTo('App\Http\Model\Plano', 'plan_id', 'plan_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function aluno()
    {
        return $this->belongsTo('App\Http\Model\Aluno', 'alu_id', 'alu_id');
    }
}
