<?php
namespace App\Repositories;

use App\User;
use App\Repositories\Contracts\UserRepositoryInterface;

class UserRepository implements UserRepositoryInterface
{
    private $user;

    public function __construct(User $user)
    {
        $this->user = $user;
    }

    public function findByToken($token)
    {
        return $this->user->where('api_token', $token);
    }
}