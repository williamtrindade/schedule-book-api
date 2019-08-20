<?php
namespace App\Repositories;

use App\Atividade;
use App\Repositories\Contracts\AtividadeRepositoryInterface;
use Illuminate\Database\Eloquent\Collection;

/**
 * Class AtividadeRepository
 * @package App\Repositories
 */
class AtividadeRepository implements AtividadeRepositoryInterface
{
    /**
     * @var Atividade
     */
    private $model;

    /**
     * AtividadeRepository constructor.
     * @param Atividade $model
     */
    public function __construct(Atividade $model)
	{
        $this->model = $model;
    }

    /**
     * @param $data
     * @return mixed
     */
    public function store($data)
    {
        return $this->model->create($data);
    }

    /**
     * @return Atividade[]|Collection
     */
    public function all() : Collection
    {
        return $this->model->all();
    }

    /**
     * @param $id
     * @return mixed
     */
    public function find($id)
    {
        return $this->model->find($id);
    }

    /**
     * @param $id
     * @param $data
     * @return mixed
     */
    public function update($id, $data)
    {
        $atividade = $this->model->find($id);
        return $atividade->update($data);
    }

    /**
     * @param $id
     * @return mixed
     */
    public function destroy($id)
    {
        $atividade = $this->model->find($id);
        return $atividade->delete();
    }

    /**
     * @param $id
     * @param $inicio
     * @param $fim
     * @return mixed
     */
    public function filter($id, $inicio, $fim)
    {
        $atividades = $this->model->where([
            ['user_id', '=', $id],
            ['inicio', '>=', $inicio],
            ['fim', '<=', $fim]
        ])->get();
        return $atividades;
    }
}
