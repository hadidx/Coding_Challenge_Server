<?php

namespace App\DTOs;

use Illuminate\Http\Request;

class UserDTO
{
    protected $request;
    public function __construct(Request $request)
    {
        $this->request = $request;
    }

    public function fetch()
    {
        $validated =  $this->request->validate(['first_name' => 'required', 'last_name' => 'required', 'email' => 'required|email|unique:users', 'password' => 'required:min:7']);
        return $validated;
    }
}
