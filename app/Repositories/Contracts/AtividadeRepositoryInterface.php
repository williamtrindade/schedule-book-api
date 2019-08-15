<?php

namespace App\Repositories\Contracts;

Interface AtividadeRepositoryInterface
{
    public function store($data);
    public function all();
    public function find($id);
    public function update($id, $request);
    public function destroy($id);
}