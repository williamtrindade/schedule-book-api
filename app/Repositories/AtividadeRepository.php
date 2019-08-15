<?php
namespace App\Repositories;

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
        dd($data);
        
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
}