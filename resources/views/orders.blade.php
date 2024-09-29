<x-layout>
    <x-container>
        <div class="m-5 mx-auto w-11/12 bg-base-100 p-5">
            <div class="mb-5 w-full !max-w-none">
                <div class="overflow-x-auto">
                    <table class="table table-lg">
                        <thead>
                            <tr>
                                <th>Rendelés időpontja</th>
                                <th>BIO rendelés</th>
                                <th>Ügyfél</th>
                                <th>Város</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($orders as $order)
                                <tr class="hover cursor-pointer">
                                    <td>{{ $order->created_at }}</td>
                                    <td>
                                        {{ $order->is_bio === 1 ? "Igen" : "Nem" }}
                                    </td>
                                    <td>
                                        {{ $order->customer->billingAddress->first_name }}
                                        {{ $order->customer->billingAddress->last_name }}
                                    </td>
                                    <td>
                                        {{ $order->customer->deliveryAddress->city }}
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </x-container>
</x-layout>
<style>
    tr th {
        font-size: 1.4em;
    }
</style>
