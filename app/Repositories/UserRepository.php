<?php
namespace App\Repositories;

use App\User;

class UserRepository
{
    public function findByToken($token)
    {
        return User::where('api_token', $token);
    }
}