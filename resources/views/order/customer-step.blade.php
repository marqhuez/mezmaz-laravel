<x-layout>
    <div class="bg-base-200 m-5 p-5 mx-auto w-11/12">
        <div class="mb-5 w-full prose !max-w-none">
            <div class="customer-step">
                <div class="mb-3">
                    <h1>Ügyfél</h1>
                    <form hx-trigger="change from:#customer-select" hx-post="/order/customer/select-customer"
                        hx-target="#customer-form">
                        <select name="customer" id="customer-select" class="input select-lg w-full" autocomplete="off">
                            <option value="">Új ügyfél</option>
                            <% customerInfos.forEach((customerInfo) => { %>
                            <option value="<%= customerInfo.id %>"><%= customerInfo.preview %></option>
                            <% }); %>
                        </select>
                    </form>
                </div>
                <hr class="mb-3">
                <form action="/new-order/customer/save" method="post">
                    <div id="customer-form">
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-layout>
