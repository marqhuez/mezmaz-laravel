<x-layout>
    <x-container>
        <div class="bg-base-200 m-5 p-5 mx-auto w-11/12">
            <div class="mb-5 w-full prose !max-w-none">
                <div>
                    <h1>Összegzés</h1>

                    <div class="flex flex-col items-center mb-5">
                        <h2 class="font-bold mb-5 ml-1">Általános</h2>
                        <table class="w-1/2">
                            <tr>
                                <td class="font-bold">Email</td>
                                <td>{{ $customer->email }}</td>
                            </tr>
                            <tr>
                                <td class="font-bold">Telefonszám</td>
                                <td>{{ $customer->phoneNumber }}</td>
                            </tr>
                            <tr>
                                <td class="font-bold">Bio rendelés</td>
                                <td>
                                    {{ $orderInfo->isBio ? "Igen" : "Nem" }}
                                </td>
                            </tr>
                        </table>
                    </div>
                    <div class="flex justify-center mb-5">
                        <div class="w-2/5 flex flex-col mr-5">
                            <h2 class="font-bold mb-5 ml-1 text-center">
                                Számlázási adatok
                            </h2>
                            <table>
                                <tr>
                                    <td class="font-bold">Vezetéknév:</td>
                                    <td>
                                        {{ $customer->billingAddress->lastName }}
                                    </td>
                                </tr>
                                <tr>
                                    <td class="font-bold">Keresztnév:</td>
                                    <td>
                                        {{ $customer->billingAddress->firstName }}
                                    </td>
                                </tr>
                                <tr>
                                    <td class="font-bold">Megye:</td>
                                    <td>
                                        {{ $customer->billingAddress->county }}
                                    </td>
                                </tr>
                                <tr>
                                    <td class="font-bold">Irányítószám:</td>
                                    <td>
                                        {{ $customer->billingAddress->postCode }}
                                    </td>
                                </tr>
                                <tr>
                                    <td class="font-bold">Város:</td>
                                    <td>
                                        {{ $customer->billingAddress->city }}
                                    </td>
                                </tr>
                                <tr>
                                    <td class="font-bold">Cím:</td>
                                    <td>
                                        {{ $customer->billingAddress->address }}
                                    </td>
                                </tr>
                            </table>
                        </div>
                        <div class="w-2/5 flex flex-col ml-5">
                            <h2 class="font-bold mb-5 ml-1 text-center">
                                Szállítási adatok
                            </h2>
                            <table>
                                <tr>
                                    <td class="font-bold">Vezetéknév:</td>
                                    <td>
                                        {{ $customer->deliveryAddress->lastName }}
                                    </td>
                                </tr>
                                <tr>
                                    <td class="font-bold">Keresztnév:</td>
                                    <td>
                                        {{ $customer->deliveryAddress->firstName }}
                                    </td>
                                </tr>
                                <tr>
                                    <td class="font-bold">Megye:</td>
                                    <td>
                                        {{ $customer->deliveryAddress->county }}
                                    </td>
                                </tr>
                                <tr>
                                    <td class="font-bold">Irányítószám:</td>
                                    <td>
                                        {{ $customer->deliveryAddress->postCode }}
                                    </td>
                                </tr>
                                <tr>
                                    <td class="font-bold">Város:</td>
                                    <td>
                                        {{ $customer->deliveryAddress->city }}
                                    </td>
                                </tr>
                                <tr>
                                    <td class="font-bold">Cím:</td>
                                    <td>
                                        {{ $customer->deliveryAddress->address }}
                                    </td>
                                </tr>
                            </table>
                        </div>
                    </div>
                </div>
                <div>
                    <div class="flex flex-col items-center">
                        <h2 class="font-bold mb-3 ml-1">Rendelés tartalma</h2>
                        <table class="w-4/5">
                            @foreach ($orderInfo->orderItems as $orderItem)
                                <tr>
                                    <td>
                                        <span class="font-bold">Méret:</span>
                                        {{ $orderItem->combSize }}
                                    </td>
                                    <td>
                                        <span class="font-bold">
                                            Mennyiség:
                                        </span>
                                        {{ $orderItem->combAmount }} kg
                                    </td>
                                    <td>
                                        <span class="font-bold">Típus:</span>
                                        {{ $orderItem->combType }}
                                    </td>
                                    <td>
                                        <span class="font-bold">
                                            Saját viasz mennyisége ehhez a
                                            tételhez:
                                        </span>
                                        {{ $orderItem->ownWaxAmount }} kg
                                    </td>
                                </tr>
                            @endforeach
                        </table>
                    </div>
                </div>
                <div class="flex justify-center">
                    <form method="post" action="/order/new/save">
                        @csrf
                        <button type="submit" class="btn btn-primary">
                            Rendelés leadása
                        </button>
                    </form>
                </div>
                <style>
                    td {
                        font-size: 16px;
                    }
                </style>
            </div>
        </div>
    </x-container>
</x-layout>
