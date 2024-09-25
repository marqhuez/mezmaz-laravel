<?php

namespace App\Http\Controllers;

use App\Services\OrderService;
use App\Services\TankService;

class ProcessController extends Controller
{
    public function __construct(
        private TankService $tankService,
        private OrderService $orderService
    ) {
    }

    public function index() {
        $tanks = $this->tankService->getAllTanks();
        $unassignedItems = $this->orderService->getUnassigned();

        return view('process', ['tanks' => $tanks, 'unassignedItems' => $unassignedItems]);
    }
}
