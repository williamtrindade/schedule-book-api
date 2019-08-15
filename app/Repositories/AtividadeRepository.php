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
        $date = new Carbon($data['inicio']);
        dd($date);
        // Se algo terminar ou começar nesse range da data que usuário quer cadastrar
        if($this->model->whereBetween('inicio', [$data['inicio'], $data['fim']])->get() || $this->model->whereBetween('fim', [$data['inicio'], $data['fim']])->get()) {
            return NULL;
        }
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