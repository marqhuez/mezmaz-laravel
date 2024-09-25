<?php

namespace App\Services;

use App\DTO\OrderInfoDTO;
use App\Models\Customer;
use App\Models\Order;
use App\Models\OrderItem;

class OrderService
{
    public function saveNewOrder(Customer $customer, OrderInfoDTO $orderInfo) {
        $order = $customer->orders()->create([
            'comment' => $orderInfo->comment,
            'secondary_phone_number' => $orderInfo->secondaryPhoneNumber,
            'is_bio' => $orderInfo->isBio,
            'status' => 'created'
        ]);

        foreach ($orderInfo->orderItems as $item) {
            $order->items()->create([
                'own_wax_amount' => $item->ownWaxAmount,
                'comb_type' => $item->combType,
                'comb_size' => $item->combSize,
                'comb_amount' => $item->combAmount
            ]);
        }
    }

    public function getAll() {
        return Order::all();
    }

    public function getUnassigned() {
        return OrderItem::unassigned()->get();
    }

    public function getAllItems() {
        return OrderItem::all();
    }
}
