<div
    class="card bg-neutral text-neutral-content w-96 mt-3"
    data-item-id="{{ $item->id }}"
>
    <div class="card-body items-center text-center">
        <table class="m-0">
            <tr class="border-none">
                <td>
                    <h4 class="mt-0 mb-0">
                        Rendelésszám:
                        <span class="font-normal">{{ $item->order_id }}</span>
                    </h4>
                    <h4 class="mt-0 mb-0">
                        Méret:
                        <span class="font-normal">{{ $item->comb_size }}</span>
                    </h4>
                    <h4 class="mt-0 mb-0">
                        Típus:
                        <span class="font-normal">{{ $item->comb_type }}</span>
                    </h4>
                    <h4 class="mt-0 mb-0">
                        Mennyiség:
                        <span class="font-normal">
                            {{ $item->comb_amount }} kg
                        </span>
                    </h4>
                    <h4 class="mt-0 mb-0">
                        Saját viasz:
                        <span class="font-normal">
                            {{ $item->own_wax_amount }} kg
                        </span>
                    </h4>
                </td>
                <td>
                    <h4 class="mt-0 mb-0">
                        Ügyfél:
                        <span class="font-normal">
                            {{ $item->order->customer->billingAddress->last_name }}
                            {{ $item->order->customer->billingAddress->first_name }}
                        </span>
                    </h4>
                    <h4 class="mt-0 mb-0">
                        Szállítási terület:
                        <span class="font-normal">
                            {{ $item->order->customer->deliveryAddress->city }}
                        </span>
                    </h4>
                </td>
            </tr>
        </table>
    </div>
</div>
