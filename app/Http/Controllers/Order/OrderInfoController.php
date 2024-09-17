<?php

namespace App\Http\Controllers\Order;

use App\DTO\OrderInfoDTO;
use App\DTO\OrderItemDTO;
use Illuminate\Http\Request;

class OrderInfoController
{
    public function orderInfoStep() {
        $initialItemCount = 3;
        session(['orderInfoItemCount' => $initialItemCount]);

        return view('order/order-info-step', ['initialItemCount' => $initialItemCount]);
    }

    public function addNewItem() {
        $itemCount = session('orderInfoItemCount');
        session(['orderInfoItemCount' => ++$itemCount]);

        return view('order/order-info-item', ['itemCount' => $itemCount]);
    }

    public function saveOrderInfo(Request $request) {
        session()->forget('orderInfoItemCount');

        $orderInfo = new OrderInfoDTO(
            $request->get('comment'),
            $request->get('secondaryPhoneNumber'),
            array_map(fn($item) => new OrderItemDTO(
                $item['ownWaxAmount'],
                $item['type'],
                $item['size'],
                $item['amount']
            ), $request->get('orderItems')),
            $request->get('isBioOrder') === 'on'
        );

        session(['orderInfo' => $orderInfo]);
        return redirect('order/new/summary');
    }
}
