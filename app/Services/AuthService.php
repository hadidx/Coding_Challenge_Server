<?php

namespace App\Services;

use App\Repositories\AuthRepository;


class AuthService
{
    protected $authRepository;

    public function __construct(AuthRepository $authRepository)
    {
        $this->authRepository = $authRepository;
    }

    public function createUser($userArray)
    {
        $user = $this->authRepository->createUser($userArray);

        return $user;
    }

    /*public function CustomerList($filters)
    {
        $customerList = $this->repo->CustomerList($filters);

        return $customerList;
    }*/

    public function checkUser($loginCredentials)
    {
        if (auth()->attempt($loginCredentials)) {
            $loginToken = auth()->user()->createToken('root')->accessToken;
            return response()->json(['token' => $loginToken,'User' => auth()->user()], 200);
        } else {
            return response()->json(['error' => 'UnAuthorised Access'], 401);
        }
    }
}
