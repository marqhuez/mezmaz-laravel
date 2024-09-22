<?php

namespace App\Http\Controllers;

use App\Services\OrderService;

class ProcessController extends Controller
{
    public function __construct(private OrderService $orderService) {
    }

    public function index() {
        $orderItems = $this->orderService->getAllItems();
        return view('process', ['items' => $orderItems]);
    }
}
