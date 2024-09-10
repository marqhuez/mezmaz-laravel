<?php

namespace App\Http\Controllers;

use App\DTO\AddressDTO;
use App\Services\CustomerService;
use App\Services\OrderService;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function __construct(
        private OrderService $orderService,
        private CustomerService $customerService
    ) {
    }

    public function customerStep(Request $request)
    {
        // $this->customerService->saveNewCustomer(
        //     'asd',
        //     'asdasd',
        //     new AddressDTO('asd', 'asd', 'asd', 'asd', 'asd', 'asd'),
        //     new AddressDTO('asd', 'asd', 'asd', 'asd', 'asd', 'asd')
        // );
        $customers = $this->customerService->getAll();
        return view('order/customer-step', ['customers' => $customers]);
    }
}
