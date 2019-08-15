<?php

namespace App\Repositories\Contracts;

Interface UserRepositoryInterface
{
    public function findByToken($token);
}