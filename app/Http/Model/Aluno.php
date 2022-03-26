<?php

namespace App\Http\Model;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Tymon\JWTAuth\Contracts\JWTSubject;

/**
 * @property int $alu_id
 * @property int $plan_id
 * @property int $arq_id
 * @property int $prof_id
 * @property string $alu_nome
 * @property string $alu_email
 * @property string $alu_senha
 * @property string $alu_whastsapp
 * @property string $alu_endlogradouro
 * @property string $alu_endnumero
 * @property string $alu_endbairro
 * @property string $alu_endcomplemento
 * @property string $alu_endcep
 * @property string $alu_dtnascimento
 * @property string $alu_profissao
 * @property boolean $alu_comoconheceu
 * @property string $alu_quemindicou
 * @property int $alu_ativo
 * @property TblProfessor $tblProfessor
 * @property TblArquivo $tblArquivo
 * @property TblPlano $tblPlano
 * @property TblAlunoanamnese[] $tblAlunoanamneses
 * @property TblAlunohorario[] $tblAlunohorarios
 * @property TblAulaaluno[] $tblAulaalunos
 * @property TblTransacao[] $tblTransacaos
 */
class Aluno extends Authenticatable implements JWTSubject
{
    /**
     * The table associated with the model.
     * 
     * @var string
     */
    protected $table = 'tbl_aluno';

    /**
     * The primary key for the model.
     * 
     * @var string
     */
    protected $primaryKey = 'alu_id';

    /**
     * Ignoring timestamps.
     * 
     * @var string
     */
    public $timestamps = false;

    /**
     * @var array
     */
    protected $fillable = ['plan_id', 'arq_id', 'prof_id', 'alu_nome', 'alu_email', 'alu_cpf', 'alu_senha', 'alu_whatsapp', 'alu_endlogradouro', 'alu_endnumero', 'alu_endbairro', 'alu_endcomplemento', 'alu_endcidade', 'alu_enduf', 'alu_endcep', 'alu_endpais', 'alu_dtnascimento', 'alu_profissao', 'alu_comoconheceu', 'alu_quemindicou', 'alu_dtvencimento', 'alu_dthraulaexperimental', 'alu_ativo'];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'alu_senha',
    ];

    public function getJWTIdentifier()
    {
        return $this->getKey();
    }
    
    public function getJWTCustomClaims()
    {
        return [];
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function professor()
    {
        return $this->belongsTo('App\Http\Model\Professor', 'prof_id', 'prof_id');
    }

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
    public function plano()
    {
        return $this->belongsTo('App\Http\Model\Plano', 'plan_id', 'plan_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function anamnese()
    {
        return $this->hasMany('App\Http\Model\AlunoAnamnese', 'alu_id', 'alu_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function horarios()
    {
        return $this->hasMany('App\Http\Model\AlunoHorarios', 'alu_id', 'alu_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function aulas()
    {
        return $this->hasMany('App\Http\Model\AulaAluno', 'alu_id', 'alu_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function transacoes()
    {
        return $this->hasMany('App\Http\Model\Transacao', 'alu_id', 'alu_id');
    }
}
