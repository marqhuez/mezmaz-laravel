<?php

namespace App\Http\Controllers;

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

    public function customerStep(Request $request) {
        // $this->customerService->saveNewCustomer(
        //     'asd',
        //     'asdasd',
        //     new AddressDTO('asd', 'asd', 'asd', 'asd', 'asd', 'asd'),
        //     new AddressDTO('asd', 'asd', 'asd', 'asd', 'asd', 'asd')
        // );
        $customers = $this->customerService->getAll();
        return view('order/customer-step', ['customers' => $customers]);
    }

    public function selectCustomer(Request $request) {
        $customerId = $request->get('customer');

        if (!$customerId) {
            return view('order/next-button');
        }

        session(['selectedCustomerId' => $customerId]);

        return view('order/customer-form');
    }

    public function saveCustomer(Request $request) {
        // const customerId = req.session.selectedCustomerId;
        //
        // if (!customerId) {
        //     req.session.customerData = {
        //         phoneNumber: req.body.phoneNumber,
        //         email: req.body.email,
        //         deliveryForBillingAddress: req.body.deliveryForBillingAddress === 'on',
        //         billingAddress: req.body.billingAddress,
        //         deliveryAddress:
        //             req.body.sameDeliveryAndBilling === 'on' ? req.body.billingAddress : req.body.deliveryAddress,
        //     };
        // }
        //
        // req.session.orderStep = 'order-info';
        // redirectToStep('order-info', res);

        $customerId = $request->get('customer');

        if (!$customerId) {
        }
    }
}
