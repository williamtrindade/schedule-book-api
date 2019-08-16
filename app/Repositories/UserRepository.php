<?php
namespace App\Repositories;

use App\User;
use App\Repositories\Contracts\UserRepositoryInterface;

class UserRepository implements UserRepositoryInterface
{
    private $model;

    public function __construct(User $model)
    {
        $this->model = $model;
    }

    public function findByToken($token)
    {
        return $this->model->where('api_token', $token);
    }
}