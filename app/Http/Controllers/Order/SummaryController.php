<?php

namespace App\Http\Controllers\Order;

use App\Services\CustomerService;

class SummaryController
{
    public function __construct(private CustomerService $customerService) {
    }

    public function summaryStep() {
        $customerId = session('selectedCustomerId');

        $customer = session('newCustomerData');
        if ($customerId) {
            $customer = $this->customerService->getById($customerId);
        }

        return view('order/summary-step', ['customer' => $customer, 'orderInfo' => session('orderInfo')]);
    }
}
