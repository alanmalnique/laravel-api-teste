<?php

namespace App\Http\Model;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int $news_id
 * @property string $news_nome
 * @property string $news_whatsapp
 * @property string $news_email
 */
class Newsletter extends Model
{
    /**
     * The table associated with the model.
     * 
     * @var string
     */
    protected $table = 'tbl_newsletter';

    /**
     * The primary key for the model.
     * 
     * @var string
     */
    protected $primaryKey = 'news_id';

    /**
     * Ignoring timestamps.
     * 
     * @var string
     */
    public $timestamps = false;

    /**
     * @var array
     */
    protected $fillable = ['news_nome', 'news_whatsapp', 'news_email'];

}
