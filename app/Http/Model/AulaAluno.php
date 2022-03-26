<?php

namespace App\Http\Model;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int $aula_id
 * @property int $alu_id
 * @property string $aalu_duracao
 * @property TblAula $tblAula
 * @property TblAluno $tblAluno
 */
class AulaAluno extends Model
{
    /**
     * The table associated with the model.
     * 
     * @var string
     */
    protected $table = 'tbl_aulaaluno';

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
    protected $primaryKey = 'aalu_id';

    /**
     * @var array
     */
    protected $fillable = ['alu_id', 'aalu_dthrinicio','aalu_dthrtermino'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function aluno()
    {
        return $this->belongsTo('App\Http\Model\Aluno', 'alu_id', 'alu_id');
    }
}
