<?php

namespace App\Http\Model;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int $anam_id
 * @property int $alu_id
 * @property boolean $anam_praticaatividade
 * @property string $anam_qualatividade
 * @property boolean $anam_tomamedicamento
 * @property string $anam_qualmedicamento
 * @property boolean $anam_fumante
 * @property string $anam_fumaquantotempo
 * @property boolean $anam_hipertensao
 * @property boolean $anam_doenca
 * @property string $anam_qualdoenca
 * @property boolean $anam_apresentador
 * @property string $anam_qualdor
 * @property string $anam_qualmovimentosentedor
 * @property boolean $anam_fezcirurgia
 * @property string $anam_cirurgiaonde
 * @property string $anam_tempocirurgia
 * @property string $anam_objetivo
 * @property TblAluno $tblAluno
 */
class AlunoAnamnese extends Model
{
    /**
     * The table associated with the model.
     * 
     * @var string
     */
    protected $table = 'tbl_alunoanamnese';

    /**
     * The primary key for the model.
     * 
     * @var string
     */
    protected $primaryKey = 'anam_id';

    /**
     * Ignoring timestamps.
     * 
     * @var string
     */
    public $timestamps = false;

    /**
     * @var array
     */
    protected $fillable = ['alu_id', 'anam_praticaatividade', 'anam_qualatividade', 'anam_tomamedicamento', 'anam_qualmedicamento', 'anam_fumante', 'anam_fumaquantotempo', 'anam_hipertensao', 'anam_doenca', 'anam_qualdoenca', 'anam_apresentador', 'anam_qualdor', 'anam_qualmovimentosentedor', 'anam_fezcirurgia', 'anam_cirurgiaonde', 'anam_tempocirurgia', 'anam_objetivo'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function aluno()
    {
        return $this->belongsTo('App\Http\Model\Aluno', 'alu_id', 'alu_id');
    }
}
