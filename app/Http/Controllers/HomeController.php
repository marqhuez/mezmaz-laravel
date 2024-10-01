<?php

namespace App\Http\Controllers;

use App\Services\OrderService;

class HomeController
{
    public function __construct(private OrderService $orderService) {
    }

    public function index() {
        $orders = $this->orderService->getAllActive();

        return view('welcome', ['orders' => $orders]);
    }
}
