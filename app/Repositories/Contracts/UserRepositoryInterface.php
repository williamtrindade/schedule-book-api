<?php

namespace App\Repositories\Contracts;

/**
 * Interface UserRepositoryInterface
 * @package App\Repositories\Contracts
 */
Interface UserRepositoryInterface
{
    /**
     * @param $token
     * @return mixed
     */
    public function findByToken($token);
}
