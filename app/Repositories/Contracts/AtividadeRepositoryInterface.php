<?php

namespace App\Repositories\Contracts;

/**
 * Interface AtividadeRepositoryInterface
 * @package App\Repositories\Contracts
 */
Interface AtividadeRepositoryInterface
{
    /**
     * @param $data
     * @return mixed
     */
    public function store($data);

    /**
     * @return mixed
     */
    public function all();

    /**
     * @param $id
     * @return mixed
     */
    public function find($id);

    /**
     * @param $id
     * @param $request
     * @return mixed
     */
    public function update($id, $request);

    /**
     * @param $id
     * @return mixed
     */
    public function destroy($id);
}
