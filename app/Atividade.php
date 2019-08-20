<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

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
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user()
    {
        return $this->belongsTo('App\User');
    }

}
