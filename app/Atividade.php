<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Atividade extends Model
{
    protected $table = 'atividades';

    protected $fillable = [
        'inicio', 'fim', 'conclusao', 'status', 'titulo', 'descricao', 'user_id'
    ];

    public function user()
    {
        return $this->belongsTo('App\User');
    }

}
