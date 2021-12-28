<?php

namespace App\Services;

use App\Repositories\CustomerRepository;


class CustomerService
{
    protected $repo;

    public function __construct(CustomerRepository $repo)
    {
        $this->repo = $repo;
    }

    public function get($filters,$recordsPerPage)
    {
        $customerList = $this->repo->get($filters,$recordsPerPage);

        return $customerList;
    }
}
