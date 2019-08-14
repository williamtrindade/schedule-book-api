<?php
namespace App\Repositories;

use App\Atividade;
use App\User;
use App\Repositories\UserRepository;

class AtividadeRespository
{
    public function get($token)
    {
        $user = new UserRepository();
        $user = $user->findByToken($token)->first();
        return $user->atividades();
    }

    public function store($atividadeData): Atividade
    {
        return Atividade::create($atividadeData);
    }

    public function all()
    {
        return Atividade::all();
    }

    public function find($id)
    {
        $atividade = Atividade::find($id);
        return $atividade;
    }

    public function update($id, $request)
    {
        $atividatde = Atividade::find($id);
        $atividade::update($request);
    }

    public function destroy($id)
    {
        $atividatde = Atividade::find($id);
        $atividade::delete($request);
    }
}