<?php

namespace App\Http\Model;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int $ahor_id
 * @property int $alu_id
 * @property int $ahor_diasemana
 * @property string $ahor_horario
 * @property TblAluno $tblAluno
 */
class AlunoHorarios extends Model
{
    /**
     * The table associated with the model.
     * 
     * @var string
     */
    protected $table = 'tbl_alunohorarios';

    /**
     * The primary key for the model.
     * 
     * @var string
     */
    protected $primaryKey = 'ahor_id';

    /**
     * Ignoring timestamps.
     * 
     * @var string
     */
    public $timestamps = false;

    /**
     * @var array
     */
    protected $fillable = ['alu_id', 'ahor_diasemana', 'ahor_horario'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function aluno()
    {
        return $this->belongsTo('App\Http\Model\Aluno', 'alu_id', 'alu_id');
    }
}
