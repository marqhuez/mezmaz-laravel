<x-layout>
    <div class="mx-auto w-11/12 py-3">
        <div class="prose mb-5 w-full !max-w-none">
            <div class="bg-base-200 w-100 p-5">
                <h4 class="card-title mt-0 mb-3">Aktív rendelések</h4>
                <div class="card bg-neutral text-neutral-content w-96">
                    <div class="card-body">
                        @forelse ($orders as $key => $order)
                            <table class="m-0">
                                <tr>
                                    <h3 class="my-0">
                                        Rendelésszám: {{ $order->id }}
                                    </h3>
                                </tr>
                                @foreach ($order->items as $item)
                                    @if (! $item->tank)
                                        @continue
                                    @endif

                                    <tr class="border-none">
                                        <td>
                                            <h3 class="my-0">
                                                {{ $item->tank->name }}:
                                                <span class="font-normal">
                                                    {{ $item->own_wax_amount }}
                                                    kg
                                                </span>
                                            </h3>
                                        </td>
                                    </tr>
                                @endforeach
                            </table>
                        @empty
                            <h3>Nincs aktív rendelés.</h3>
                        @endforelse
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-layout>
