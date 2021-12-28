<?php

namespace App\Repositories;

use App\Models\User;
use Illuminate\Http\Request;

class AuthRepository
{
    protected $user;

    public function __construct(User $user)
    {
        $this->user = $user;
    }

    public function createUser($userArray)
    {
        $user = User::create(['first_name' => $userArray['first_name'], 'last_name' => $userArray['last_name'], 'email' => $userArray['email'], 'password' => bcrypt($userArray['password'])]);

        return $user;
    }

    /*public function customerList($filters)
    {
        $customerList = User::where('first_name', 'like', '%' . $filters['first_name'] . '%')->where('email', 'like', '%' . $filters['email'] . '%')->paginate($filters['records']);

        return $customerList;
    }*/
}
