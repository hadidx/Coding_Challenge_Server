<?php

namespace App\Services;

use App\Repositories\AuthRepository;


class AuthService
{
    protected $repo;

    public function __construct(AuthRepository $repo)
    {
        $this->repo = $repo;
    }

    public function CreateUser($userArray)
    {
        $user = $this->repo->CreateUser($userArray);

        return $user;
    }

    public function CustomerList($filters)
    {
        $customerList = $this->repo->CustomerList($filters);

        return $customerList;
    }
}
