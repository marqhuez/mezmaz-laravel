<form action="/order/new/customer/save">
    <div class="flex">
        <div class="inline-block w-1/3 pr-2">
            <h3>Telefonszám</h3>
            <input class="input w-full" type="text" name="phoneNumber" value="">
        </div>
        <div class="inline-block w-2/3 pl-2">
            <h3>Email</h3>
            <input class="input w-full" type="text" name="email" value="">
        </div>
    </div>
    <hr class="mb-5">
    <div class="flex justify-center">
        <div class="mr-5 flex items-center">
            <input name="sameDeliveryAndBilling" onchange="switchSameDeliveryAndBilling(this)"
                id="separateDeliveryAddressToggle" type="checkbox" class="toggle toggle-primary" checked="checked"
                autocomplete="off" />
            <label class="ml-2" for="separateDeliveryAddressToggle">Szállítási és számlázási cím megegyezik</label>
        </div>
        <div class="mr-5 flex items-center">
            <input name="deliveryForBillingAddress" id="deliveryForBillingAddress" type="checkbox"
                class="toggle toggle-primary" autocomplete="off" />
            <label class="ml-2" for="deliveryForBillingAddress">Számlázási címre kéri a szállítást</label>
        </div>
    </div>
    <hr class="mt-4 mb-3">
    <div id="billing-address">
        <div class="flex">
            <div class="inline-block w-1/2 pr-2">
                <h3>Vezetéknév</h3>
                <input class="input w-full" type="text" name="billingAddress[lastName]" value="" required>
            </div>
            <div class="inline-block w-1/2 pl-2">
                <h3>Keresztnév</h3>
                <input class="input w-full" type="text" name="billingAddress[firstName]" value="" required>
            </div>
        </div>
        <div class="inline-block w-full">
            <h3>Megye</h3>
            <input class="input w-full" type="text" name="billingAddress[county]" value="" required>
        </div>
        <div class="flex">
            <div class="inline-block w-1/5 pr-2">
                <h3>Irányítószám</h3>
                <input class="input w-full appearance-textfield" type="number" name="billingAddress[postCode]"
                    value="" required>
            </div>
            <div class="inline-block w-4/5 pl-2">
                <h3>Város</h3>
                <input class="input w-full" type="text" name="billingAddress[city]" value="" required>
            </div>
        </div>
        <div class="inline-block w-full">
            <h3>Cím</h3>
            <input class="input w-full" type="text" name="billingAddress[addressLine]" value="" required>
        </div>
    </div>
    <div class="hidden" id="delivery-address">
        <div class="flex">
            <div class="inline-block w-1/2 pr-2">
                <h3>Vezetéknév</h3>
                <input class="input w-full" type="text" name="deliveryAddress[lastName]" value="">
            </div>
            <div class="inline-block w-1/2 pl-2">
                <h3>Keresztnév</h3>
                <input class="input w-full" type="text" name="deliveryAddress[firstName]" value="">
            </div>
        </div>
        <div class="inline-block w-full">
            <h3>Megye</h3>
            <input class="input w-full" type="text" name="deliveryAddress[county]" value="">
        </div>
        <div class="flex">
            <div class="inline-block w-1/5 pr-2">
                <h3>Irányítószám</h3>
                <input class="input w-full appearance-textfield" type="number" name="deliveryAddress[postCode]"
                    value="">
            </div>
            <div class="inline-block w-4/5 pl-2">
                <h3>Város</h3>
                <input class="input w-full" type="text" name="deliveryAddress[city]" value="">
            </div>
        </div>
        <div class="inline-block w-full">
            <h3>Cím</h3>
            <input class="input w-full" type="text" name="deliveryAddress[addressLine]" value="">
        </div>
    </div>
    @include('order/next-button')
</form>
