<x-layout>
    <div class="w-full prose !max-w-none">
        <div class="h-screen overflow-scroll float-left w-1/2 mt-4">
            <ul id="items" class="list-none">
                @foreach ($items as $item)
                    <li>
                        <div class="card bg-neutral text-neutral-content w-128">
                            <div class="card-body items-center text-center">
                                <table class="m-0">
                                    <tr class="border-none">
                                        <td>
                                            <h3 class="mt-0 mb-0">Rendelésszám: <span
                                                    class="font-normal">{{ $item->order_id }}</span></h3>
                                            <h3 class="mt-0 mb-0">Méret: <span
                                                    class="font-normal">{{ $item->comb_size }}</span></h3>
                                            <h3 class="mt-0 mb-0">Típus: <span
                                                    class="font-normal">{{ $item->comb_type }}</span></h3>
                                            <h3 class="mt-0 mb-0">Mennyiség: <span
                                                    class="font-normal">{{ $item->comb_amount }} kg</span></h3>
                                            <h3 class="mt-0 mb-0">Saját viasz mennyiség: <span
                                                    class="font-normal">{{ $item->own_wax_amount }} kg</span></h3>
                                        </td>
                                        <td>
                                            <h3 class="mt-0 mb-0">Ügyfél: <span class="font-normal">
                                                    {{ $item->order->customer->billingAddress->last_name }}
                                                    {{ $item->order->customer->billingAddress->first_name }}</span>
                                            </h3>
                                        </td>
                                    </tr>
                                </table>
                            </div>
                        </div>
                    </li>
                @endforeach
            </ul>
        </div>
        <div class="w-1/2 float-right mt-4">
            <ul id="tanks" class="list-none mt-4 min-h-20">
            </ul>
        </div>
    </div>
    <script>
        window.onload = () => {
            var items = document.getElementById('items');
            Sortable.create(items, {
                group: 'shared',
                animation: 150,
                ghostClass: 'blue-background-class'
            });

            var tanks = document.getElementById('tanks');
            Sortable.create(tanks, {
                group: 'shared',
                animation: 150,
                ghostClass: 'blue-background-class'
            });
        }
    </script>
    <style>
        .container {
            max-width: unset !important;
        }
    </style>
</x-layout>
