<?php

namespace App\Http\Model;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Tymon\JWTAuth\Contracts\JWTSubject;

/**
 * @property int $prof_id
 * @property string $prof_nome
 * @property string $prof_whatsapp
 * @property string $prof_email
 * @property string $prof_senha
 * @property string $prof_descricao
 * @property boolean $prof_ativo
 * @property string $prof_dtnascimento
 * @property TblAluno[] $tblAlunos
 * @property TblAulaprofessor[] $tblAulaprofessors
 * @property TblProfessorhorario[] $tblProfessorhorarios
 */
class Professor extends Authenticatable implements JWTSubject
{
    /**
     * The table associated with the model.
     * 
     * @var string
     */
    protected $table = 'tbl_professor';

    /**
     * Ignoring timestamps.
     * 
     * @var string
     */
    public $timestamps = false;

    /**
     * The primary key for the model.
     * 
     * @var string
     */
    protected $primaryKey = 'prof_id';

    /**
     * @var array
     */
    protected $fillable = ['prof_nome', 'prof_whatsapp', 'prof_email', 'prof_descricao', 'prof_ativo', 'prof_dtnascimento', 'prof_endlogradouro', 'prof_endnumero', 'prof_endcomplemento', 'prof_endbairro', 'prof_endcidade', 'prof_enduf', 'prof_endcep', 'prof_urlstreaming'];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'prof_senha',
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
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function alunos()
    {
        return $this->hasMany('App\Http\Model\Aluno', 'prof_id', 'prof_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function aulas()
    {
        return $this->hasMany('App\Http\Model\AulaProfessor', 'prof_id', 'prof_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function horarios()
    {
        return $this->hasMany('App\Http\Model\ProfessorHorarios', 'prof_id', 'prof_id');
    }
}
