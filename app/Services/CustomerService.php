<?php

namespace App\Services;

use App\Repositories\CustomerRepository;


class CustomerService
{
    protected $customerRepo;

    public function __construct(CustomerRepository $customerRepo)
    {
        $this->customerRepo = $customerRepo;
    }

    public function get($filters,$recordsPerPage)
    {
        $customerList = $this->customerRepo->get($filters,$recordsPerPage);

        return $customerList;
    }
}
