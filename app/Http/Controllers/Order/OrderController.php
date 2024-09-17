<?php

namespace App\Http\Controllers\Order;

use App\Exceptions\ExpectedException;
use App\Http\Controllers\Controller;
use App\Services\CustomerService;
use App\Services\OrderService;
use Illuminate\Http\Request;
use Throwable;

class OrderController extends Controller
{
    public function __construct(
        private OrderService $orderService,
        private CustomerService $customerService
    ) {
    }

    public function saveNewOrder() {
        $customerId = session('selectedCustomerId');

        if ($customerId) {
            $customer = $this->customerService->getById($customerId);
        } else {
            $customer = $this->customerService->saveNewCustomer(session('newCustomerData'));
        }

        $orderInfo = session('orderInfo');
        if (!$customer || !$orderInfo) {
            return;
        }

        try {
            $this->orderService->saveNewOrder($customer, $orderInfo);
        } catch (ExpectedException $exception) {
            return;
        } catch (Throwable $exception) {
            return;
        }

        return redirect('order/new/success');
    }
}
