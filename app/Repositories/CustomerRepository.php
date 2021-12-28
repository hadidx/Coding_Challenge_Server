<?php

namespace App\Repositories;

use App\Models\User;
use Illuminate\Http\Request;

class CustomerRepository
{
    protected $user;

    public function __construct(User $user)
    {
        $this->user = $user;
    }

    public function get($filters,$recordsPerPage)
    {
        //$customerList = User::where('first_name', 'like', '%' . $filters['first_name'] . '%')->where('email', 'like', '%' . $filters['email'] . '%')->paginate($filters['records']);
        $customerList = $this->user;
        foreach ($filters as $key=>$filter)
        {
            $customerList = $customerList->where($key,'like','%'. $filter.'%');
        }
        $customerList = $customerList->paginate($recordsPerPage);
        return $customerList;
    }
}
