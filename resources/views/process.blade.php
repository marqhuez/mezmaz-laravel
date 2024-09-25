<x-layout>
    <div class="w-full prose flex !max-w-none gap-x-8 overflow-x-scroll">
        <div class="h-screen overflow-scroll min-w-128 flex flex-col items-center bg-base-200 ml-8">
            <h3 class="mt-2">Rendelések</h3>
            <hr class="mb-3">
            <label class="input input-bordered flex items-center gap-2">
                <input type="text" class="grow h-10" placeholder="Keresés" />
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 16 16" fill="currentColor"
                    class="h-4 w-4 opacity-70">
                    <path fill-rule="evenodd"
                        d="M9.965 11.026a5 5 0 1 1 1.06-1.06l2.755 2.754a.75.75 0 1 1-1.06 1.06l-2.755-2.754ZM10.5 7a3.5 3.5 0 1 1-7 0 3.5 3.5 0 0 1 7 0Z"
                        clip-rule="evenodd" />
                </svg>
            </label>
            <div id="items" class="mt-5 pb-3">
                @foreach ($items as $item)
                    <div class="card bg-neutral text-neutral-content w-96 mt-3">
                        <div class="card-body items-center text-center">
                            <table class="m-0">
                                <tr class="border-none">
                                    <td>
                                        <h4 class="mt-0 mb-0">Rendelésszám: <span
                                                class="font-normal">{{ $item->order_id }}</span></h4>
                                        <h4 class="mt-0 mb-0">Méret: <span
                                                class="font-normal">{{ $item->comb_size }}</span></h4>
                                        <h4 class="mt-0 mb-0">Típus: <span
                                                class="font-normal">{{ $item->comb_type }}</span></h4>
                                        <h4 class="mt-0 mb-0">Mennyiség: <span
                                                class="font-normal">{{ $item->comb_amount }} kg</span></h4>
                                        <h4 class="mt-0 mb-0">Saját viasz: <span
                                                class="font-normal">{{ $item->own_wax_amount }} kg</span></h4>
                                    </td>
                                    <td>
                                        <h4 class="mt-0 mb-0">Ügyfél: <span class="font-normal">
                                                {{ $item->order->customer->billingAddress->last_name }}
                                                {{ $item->order->customer->billingAddress->first_name }}</span>
                                        </h4>
                                        <h4 class="mt-0 mb-0">Szállítási terület: <span class="font-normal">
                                                {{ $item->order->customer->deliveryAddress->city }}</span>
                                        </h4>
                                    </td>
                                </tr>
                            </table>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
        <div class="min-w-128 h-screen overflow-scroll flex flex-col items-center bg-base-200">
            <h3 class="mt-2">1. tartály</h3>
            <hr class="mb-3">
            <div class="tanks flex flex-col items-center min-h-64 w-full pb-3">
            </div>
        </div>
        <div class="min-w-128 h-screen overflow-scroll flex flex-col items-center bg-base-200">
            <h3 class="mt-2">2. tartály</h3>
            <hr class="mb-3">
            <div class="tanks flex flex-col items-center min-h-64 w-full pb-3">
            </div>
        </div>
        <div class="min-w-128 h-screen overflow-scroll flex flex-col items-center bg-base-200 mr-8">
            <h3 class="mt-2">3. tartály</h3>
            <hr class="mb-3">
            <div class="tanks flex flex-col items-center min-h-64 w-full pb-3">
            </div>
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

            var tanks = document.querySelectorAll('.tanks');
            tanks.forEach((tank) => {
                Sortable.create(tank, {
                    group: 'shared',
                    animation: 150,
                    ghostClass: 'blue-background-class'
                });
            })
        }
    </script>
    <style>
        .container {
            max-width: unset !important;
        }
    </style>
</x-layout>
