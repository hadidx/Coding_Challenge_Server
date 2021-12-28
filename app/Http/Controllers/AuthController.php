<?php

namespace App\Http\Controllers;

use App\Services\AuthService;
use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Requests\RegistrationRequest;
use App\Http\Requests\LoginRequest;


class AuthController extends Controller
{
    protected $service;
    protected $userDTO;
    public function __construct(AuthService $service)
    {
        $this->service = $service;
        //$this->middleware('auth:api', ['except' => ['login', 'registerUser']]);
    }

    public function registerUser(RegistrationRequest $request)
    {
        //$this->validate($request, ['first_name' => 'required', 'last_name' => 'required', 'email' => 'required|email|unique:users', 'password' => 'required:min:7']);
        //$userArray = ['first_name' => $request->first_name, 'last_name' => $request->last_name, 'email' => $request->email, 'password' => $request->password];
        //$this->userDTO = new UserDTO($request);
        //$user = User::create(['first_name' => $request->first_name, 'last_name' => $request->last_name, 'email' => $request->email, 'password' => bcrypt($request->password)]);
        //$access_Token = $user->createToken('root')->accessToken;
        //return response()->json(['token'=>$access_Token],200);
        $data = $request->validated();
        $this->service->CreateUser($data);
        return response()->json(['message' => 'Customer Registered Successfully'], 200);
    }

    public function login(LoginRequest $request)
    {
        $loginCredentials = $request->validated();

        if (auth()->attempt($loginCredentials)) {
            $loginToken = auth()->user()->createToken('root')->accessToken;
            return response()->json(['token' => $loginToken,'User' => auth()->user()], 200);
        } else {
            return response()->json(['error' => 'UnAuthorised Access'], 401);
        }
    }

    public function User()
    {
        return response()->json(['User' => auth()->user()], 200);
    }

    public function logout()
    {
        auth('web')->logout();

        return response()->json(['message' => 'User successfully signed out']);
    }
}
