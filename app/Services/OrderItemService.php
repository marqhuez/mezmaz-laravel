<?php

namespace App\Services;

use App\Models\OrderItem;

class OrderItemService
{
    public function getAll() {
        return OrderItem::all();
    }

    public function getById(int $id) {
        return OrderItem::find($id);
    }

    public function getUnassigned() {
        return OrderItem::unassigned()->get();
    }
}
