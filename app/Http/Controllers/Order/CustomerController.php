<?php

namespace App\Http\Controllers\Order;

use App\DTO\AddressDTO;
use App\DTO\CustomerDTO;
use App\Services\CustomerService;
use App\Services\OrderService;
use Symfony\Component\HttpFoundation\Request;

class CustomerController
{
    public function __construct(
        private OrderService $orderService,
        private CustomerService $customerService
    ) {
    }

    public function customerStep() {
        session()->forget('selectedCustomerId');

        $customers = $this->customerService->getAll();
        return view('order/customer-step', ['customers' => $customers]);
    }

    public function selectCustomer(Request $request) {
        $customerId = $request->get('customer');

        if ($customerId) {
            session(['selectedCustomerId' => $customerId]);
            return view('order/next-button');
        }

        session()->forget('selectedCustomerId');
        return view('order/customer-form');
    }

    public function saveCustomer(Request $request) {
        $customerId = session('selectedCustomerId');

        if (!$customerId) {
            $billingAddress = $request->get('billingAddress');
            $deliveryAddress = $request->get('sameDeliveryAndBilling')
                    ? $request->get('billingAddress')
                    : $request->get('deliveryAddress');

            $newCustomer = new CustomerDTO(
                $request->get('phoneNumber'),
                $request->get('email'),
                $request->get('deliveryForBillingAddress') === 'on',
                AddressDTO::fromArray($billingAddress),
                AddressDTO::fromArray($deliveryAddress),
            );
            session(['newCustomerData' => $newCustomer]);
        }

        return redirect('order/new/order-info');
    }
}
