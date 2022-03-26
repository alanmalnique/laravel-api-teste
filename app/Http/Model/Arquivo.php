<?php

namespace App\Http\Model;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int $arq_id
 * @property string $arq_pasta
 * @property string $arq_nome
 * @property string $arq_data
 * @property string $arq_extensao
 * @property TblAluno[] $tblAlunos
 * @property TblBlog[] $tblBlogs
 * @property TblInstitucionalcategorium[] $tblInstitucionalcategorias
 * @property TblParceiro[] $tblParceiros
 * @property TblPlano[] $tblPlanos
 */
class Arquivo extends Model
{
    /**
     * The table associated with the model.
     * 
     * @var string
     */
    protected $table = 'tbl_arquivo';

    /**
     * The primary key for the model.
     * 
     * @var string
     */
    protected $primaryKey = 'arq_id';

    /**
     * Ignoring timestamps.
     * 
     * @var string
     */
    public $timestamps = false;

    /**
     * @var array
     */
    protected $fillable = ['arq_pasta', 'arq_nome', 'arq_data', 'arq_extensao'];
}
