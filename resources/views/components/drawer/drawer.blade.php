<div class="drawer lg:drawer-open">
    <input id="my-drawer-2" type="checkbox" class="drawer-toggle" />
    <div class="drawer-content flex flex-col items-center justify-center">
        <!-- Page content here -->
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
                'isActive' => false,
            ])
            @include('components.drawer.drawer-item', [
                'href' => '/order/new',
                'icon' => 'fa-plus',
                'isActive' => false,
            ])
            @include('components.drawer.drawer-item', [
                'href' => '/orders',
                'icon' => 'fa-list',
                'isActive' => true,
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
