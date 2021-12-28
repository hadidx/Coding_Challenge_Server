<?php

namespace App\Http\Controllers;

use App\Services\CustomerService;
use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Requests\CustomerRequest;

class CustomerController extends Controller
{
    protected $service;
    public function __construct(CustomerService $service)
    {
        $this->service = $service;
        //$this->middleware('auth:api', ['except' => ['login', 'registerUser']]);
    }

    public function get(CustomerRequest $request,$records = 10)
    {
        //$filters = ['first_name' => $name, 'email' => $email];
        //$customerList = User::where('first_name', 'like', '%' . $name . '%')->where('email', 'like', '%' . $email . '%')->paginate($records);
        //$name = request('first_name');
        //$email = request('email');
        //if (auth()->check() && auth()->user()->role == 'admin')
        //{
            $filters = $request->validated();
            $customerList = $this->service->get($filters,$records);
            return response()->json($customerList, 200);
        //}
        //else {
          //  return response()->json(['error' => 'UnAuthorised Access'], 401);
        //}
    }
}
