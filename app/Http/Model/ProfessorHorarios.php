<?php

namespace App\Http\Model;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int $phor_id
 * @property int $prof_id
 * @property boolean $phor_diasemana
 * @property string $phor_horario
 * @property TblProfessor $tblProfessor
 */
class ProfessorHorarios extends Model
{
    /**
     * The table associated with the model.
     * 
     * @var string
     */
    protected $table = 'tbl_professorhorarios';

    /**
     * The primary key for the model.
     * 
     * @var string
     */
    protected $primaryKey = 'phor_id';

    /**
     * Ignoring timestamps.
     * 
     * @var string
     */
    public $timestamps = false;

    /**
     * @var array
     */
    protected $fillable = ['prof_id', 'phor_diasemana', 'phor_horario'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function professor()
    {
        return $this->belongsTo('App\Http\Model\Professor', 'prof_id', 'prof_id');
    }
}
