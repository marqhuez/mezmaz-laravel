<div class="order-item">
    <div class="flex">
        <div class="inline-block w-4/12 pr-4 own-wax-input-container">
            <h3>Saját viasz mennyisége</h3>
            <span class="inline-block h-12 pr-4 w-full" style="border-right: 1px solid var(--tw-prose-hr);">
                <input class="input w-full appearance-textfield" type="number"
                    name="orderItems[{{ $itemCount }}][ownWaxAmount]" value="" required>
            </span>
        </div>
        <div class="inline-block w-3/12 pr-2 order-info-input-container">
            <h3>Műlép típusa</h3>
            <input class="input w-full" type="text" name="orderItems[{{ $itemCount }}][type]" value=""
                required>
        </div>
        <div class="inline-block w-3/12 pr-2 order-info-input-container">
            <h3>Műlép mérete</h3>
            <input class="input w-full" type="text" name="orderItems[{{ $itemCount }}][size]" value=""
                required>
        </div>
        <div class="inline-block w-3/12 order-info-input-container">
            <h3>Műlép mennyisége</h3>
            <input class="input w-full appearance-textfield" type="number"
                name="orderItems[{{ $itemCount }}][amount]" value="" required>
        </div>
        <div class="inline-block w-2/12">
            <div class="flex flex-col h-full justify-between">
                <h3></h3>
                <button type="button" onclick="handleDeleteOrderItem(this)"
                    class="delete-item-button text-3xl mb-2 text-red-500"><i class="fa-solid fa-trash"></i></button>
            </div>
        </div>
    </div>
    <hr class="mb-3">
</div>
