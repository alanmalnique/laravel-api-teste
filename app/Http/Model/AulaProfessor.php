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
class AulaProfessor extends Model
{
    /**
     * The table associated with the model.
     * 
     * @var string
     */
    protected $table = 'tbl_aulaprofessor';

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
    protected $primaryKey = 'aprof_id';

    /**
     * @var array
     */
    protected $fillable = ['prof_id', 'aprof_dthrinicio','aprof_dthrtermino'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function professor()
    {
        return $this->belongsTo('App\Http\Model\Professor', 'prof_id', 'prof_id');
    }
}
