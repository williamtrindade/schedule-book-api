<?php
namespace App\Repositories;

use Carbon\Carbon;
use App\Atividade;
use App\Repositories\Contracts\AtividadeRepositoryInterface;

class AtividadeRespository implements AtividadeRepositoryInterface
{
    private $model;

    public function __construct(Atividade $model)
	{
        $this->model = $model;
    }

    public function store($data)
    {        
        return $this->model->create($data);
    }

    public function all()
    {
        return $this->model->all();
    }

    public function find($id)
    {
        return $this->model->find($id);
    }

    public function update($id, $data)
    {
        $atividade = $this->model->find($id);
        return $atividade->update($data);
    }

    public function destroy($id)
    {
        $atividatde = $this->model->find($id);
        return $atividade->delete();
    }

    public function filter($id, $inicio, $fim) {
        $atividades = $this->model->where([
            ['user_id', '=', $id],
            ['inicio', '>=', $inicio],
            ['fim', '<=', $fim]
        ])->get();

        return $atividades;
    }

}