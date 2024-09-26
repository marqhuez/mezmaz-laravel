<x-layout>
    <x-container>
        <div class="bg-base-200 m-5 p-5 mx-auto w-11/12">
            <div class="mb-5 w-full prose !max-w-none">
                <div class="order-info-step">
                    <form action="/order/new/order-info/save" method="post">
                        @csrf
                        <div class="mb-3">
                            <h1>Rendelés adatai</h1>
                            <div class="flex justify-center">
                                <div class="mr-5 flex items-center">
                                    <input name="hasOwnWax" onchange="ownWaxToggleListener(this)" id="hasOwnWaxToggle"
                                        type="checkbox" class="toggle toggle-primary" checked="checked"
                                        autocomplete="off" />
                                    <label class="ml-2" for="hasOwnWaxToggle">Saját viaszos rendelés</label>
                                </div>
                                <div class="mr-5 flex items-center">
                                    <input name="isBioOrder" onchange="bioToggleListener(this)" id="isBioOrderToggle"
                                        type="checkbox" class="toggle toggle-primary" autocomplete="off" />
                                    <label class="ml-2" for="isBioOrderToggle">Bio rendelés</label>
                                </div>
                            </div>
                        </div>
                        <hr class="mb-3">
                        <div>
                            <h3>Megjegyzés</h3>
                            <input class="input w-full" type="text" name="comment" value="">
                            <h3>Második telefonszám</h3>
                            <input class="input w-full" type="text" name="secondaryPhoneNumber" value="">
                        </div>
                        <hr class="mb-3">
                        <div id="order-items">
                            @for ($i = 0; $i < $initialItemCount; $i++)
                                @include('order/order-info-item', ['itemCount' => $i])
                            @endfor
                        </div>
                        <div class="flex justify-center text-7xl">
                            <button type="button" hx-get="/order/new/order-info/new-order-item"
                                hx-target="#order-items" hx-swap="beforeend">+</button>
                        </div>
                        @include('order/next-button')
                    </form>
                    <script>
                        const handleOwnWaxToggle = (value) => {
                            const infoInputs = document.querySelectorAll(".order-info-input-container")
                            const waxInputs = document.querySelectorAll(".own-wax-input-container")

                            if (value) {
                                for (const input of infoInputs) {
                                    input.classList.add("w-3/12")
                                    input.classList.remove("w-4/12")
                                }

                                for (const input of waxInputs) {
                                    input.classList.remove("hidden")
                                }
                                return;
                            }

                            for (const input of infoInputs) {
                                input.classList.remove("w-3/12")
                                input.classList.add("w-4/12")
                            }

                            for (const input of waxInputs) {
                                input.classList.add("hidden")
                            }
                        }

                        const bioToggleListener = (element) => {
                            if (element.checked) {
                                document.querySelector("#hasOwnWaxToggle").checked = true;
                                handleOwnWaxToggle(true)
                            }
                        }

                        const ownWaxToggleListener = (element) => {
                            if (!element.checked) {
                                document.querySelector("#isBioOrderToggle").checked = false;
                            }

                            handleOwnWaxToggle(element.checked)
                        }

                        const handleDeleteOrderItem = (element) => {
                            element.closest(".order-item").remove();
                        }
                    </script>
                </div>
            </div>
        </div>
    </x-container>
</x-layout>
