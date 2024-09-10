<x-layout>
    <div class="bg-base-200 m-5 p-5 mx-auto w-11/12">
        <div class="mb-5 w-full prose !max-w-none">
            <div class="customer-step">
                <div class="mb-3">
                    <h1>Ügyfél</h1>
                    <form hx-trigger="change from:#customer-select" hx-post="/order/new/customer/select-customer"
                        hx-target="#customer-form">
                        <select name="customer" id="customer-select" class="input select-lg w-full" autocomplete="off">
                            <option value="">Új ügyfél</option>
                            @foreach ($customers as $customer)
                                <option value="{{ $customer->id }}">{{ $customer->billingAddress->last_name }}
                                    {{ $customer->billingAddress->first_name }} - {{ $customer->phone_number }} -
                                    {{ $customer->email }}</option>
                            @endforeach
                        </select>
                    </form>
                </div>
                <hr class="mb-3">
                <form action="/order/new/customer/save" method="post">
                    <div id="customer-form">
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-layout>
