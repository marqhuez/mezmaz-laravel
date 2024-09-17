<div class="drawer lg:drawer-open">
    <input id="my-drawer-2" type="checkbox" class="drawer-toggle" />
    <div class="drawer-content flex flex-col items-center justify-center">
        <label for="my-drawer-2" class="btn btn-primary drawer-button lg:hidden">
            Open drawer
        </label>
    </div>
    <div class="drawer-side">
        <label for="my-drawer-2" aria-label="close sidebar" class="drawer-overlay"></label>
        <ul class="menu bg-base-200 text-base-content min-h-full p-4">
            @include('components.drawer.drawer-item', [
                'href' => '/',
                'icon' => 'fa-house',
                'isActive' => Route::current()->getName() === 'home',
            ])
            @include('components.drawer.drawer-item', [
                'href' => '/order/new/customer',
                'icon' => 'fa-plus',
                'isActive' =>
                    Route::current()->getName() === 'customerStep' ||
                    Route::current()->getName() === 'orderInfoStep' ||
                    Route::current()->getName() === 'summaryStep',
            ])
            @include('components.drawer.drawer-item', [
                'href' => '/orders',
                'icon' => 'fa-list',
                'isActive' => Route::current()->getName() === 'orders',
            ])
        </ul>
    </div>
</div>

<style>
    .c-list-item {
        font-size: 2.3em;
    }

    .c-list-item a {
        display: flex;
        justify-content: center;
    }
</style>
