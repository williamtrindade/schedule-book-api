<?php
namespace App\Repositories;

use App\Atividade;

class AtividadeRespository
{
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
        if(!$atividade) {
            return ['message' => 'Record not found', 'status' => 404];
        }
        return $atividade;
    }

    public function update($id, $request)
    {
        $atividatde = Atividade::find($id);
        if(!$atividade) {
            return ['message' => 'Record not found', 'status' => 404];
        }
        $atividade::update($request);
    }

    public function destroy($id)
    {
        $atividatde = Atividade::find($id);
        if(!$atividade) {
            return ['message' => 'Record not found', 'status' => 404];
        }
        $atividade::delete($request);
    }
}