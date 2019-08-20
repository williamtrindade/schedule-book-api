<?php
namespace App\Repositories;

use App\User;
use App\Repositories\Contracts\UserRepositoryInterface;

/**
 * Class UserRepository
 * @package App\Repositories
 */
class UserRepository implements UserRepositoryInterface
{
    /**
     * @var User
     */
    private $model;

    /**
     * UserRepository constructor.
     * @param User $model
     */
    public function __construct(User $model)
    {
        $this->model = $model;
    }

    /**
     * @param int $token
     * @return mixed
     */
    public function findByToken($token)
    {
        return $this->model->where('api_token', $token);
    }
}
