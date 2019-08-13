<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Atividade extends Model
{
    protected $table = 'atividades';

    protected $fillable = [
        'data_de_inicio', 'data_de_prazo', 'data_de_conclusao', 'status', 'tituto', 'descricao',
    ];

    public function user()
    {
        return $this->belongsTo('App\User', 'user_id');
    }

}
