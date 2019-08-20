<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * Class Atividade
 * @package App
 */
class Atividade extends Model
{
    /**
     * @var string
     */
    protected $table = 'atividades';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'inicio', 'fim', 'conclusao', 'status', 'titulo', 'descricao', 'user_id'
    ];

    /**
     * Return the User instance
     *
     * @return BelongsTo
     */
    public function user()
    {
        return $this->belongsTo('App\User');
    }

}
