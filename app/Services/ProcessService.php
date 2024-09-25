<?php

namespace App\Services;

class ProcessService
{
    public function __construct(
        private OrderItemService $orderItemService,
        private TankService $tankService,
        private EventService $eventService
    ) {
    }

    public function moveItemToTank(int $itemId, ?int $from, ?int $to) {
        $orderItem = $this->orderItemService->getById($itemId);

        if (!$to) {
            $orderItem->tank()->disassociate();
            $orderItem->save();

            $orderItem->moveEvents()->create(['from_tank_id' => $from]);

            return;
        }

        $tank = $this->tankService->getById($to);

        $orderItem->moveEvents()->create(['from_tank_id' => $from, 'to_tank_id']);

        $orderItem->tank()->associate($tank);
        $orderItem->save();
    }
}
