<?php

namespace App\Http\Model;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int $aula_id
 * @property string $aula_dthrinicio
 * @property string $aula_dthrtermino
 * @property TblAulaaluno[] $tblAulaalunos
 * @property TblAulaprofessor[] $tblAulaprofessors
 */
class Aula extends Model
{
    /**
     * The table associated with the model.
     * 
     * @var string
     */
    protected $table = 'tbl_aula';

    /**
     * The primary key for the model.
     * 
     * @var string
     */
    protected $primaryKey = 'aula_id';

    /**
     * Ignoring timestamps.
     * 
     * @var string
     */
    public $timestamps = false;

    /**
     * @var array
     */
    protected $fillable = ['aula_dthrinicio', 'aula_dthrtermino'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function alunos()
    {
        return $this->hasMany('App\Http\Model\AulaAluno', 'aula_id', 'aula_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function professor()
    {
        return $this->hasOne('App\Http\Model\AulaProfessor', 'aula_id', 'aula_id');
    }
}
