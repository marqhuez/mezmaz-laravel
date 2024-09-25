<?php

namespace App\Http\Controllers;

use App\Services\OrderItemService;
use App\Services\ProcessService;
use App\Services\TankService;
use Illuminate\Http\Request;

class ProcessController extends Controller
{
    public function __construct(
        private TankService $tankService,
        private OrderItemService $orderItemService,
        private ProcessService $processService
    ) {
    }

    public function index() {
        $tanks = $this->tankService->getAllTanks();
        $unassignedItems = $this->orderItemService->getUnassigned();

        return view('process', ['tanks' => $tanks, 'unassignedItems' => $unassignedItems]);
    }

    public function moveItem(Request $request) {
        $itemId = $request->input('itemId');
        $to = $request->input('to');
        $from = $request->input('from');

        $this->processService->moveItemToTank($itemId, $from, $to);
    }
}
