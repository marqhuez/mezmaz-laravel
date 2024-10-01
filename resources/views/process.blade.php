<x-layout>
    <div
        class="prose mx-auto flex w-11/12 !max-w-none gap-x-8 overflow-x-scroll px-8"
    >
        <div
            class="flex h-screen min-w-128 flex-col items-center overflow-scroll bg-base-200"
        >
            <h3 class="mt-2">Tételek</h3>
            <hr class="mb-3" />
            <label class="input input-bordered flex items-center gap-2">
                <input class="h-10 grow" type="text" placeholder="Keresés" />

                <svg
                    class="h-4 w-4 opacity-70"
                    xmlns="http://www.w3.org/2000/svg"
                    viewBox="0 0 16 16"
                    fill="currentColor"
                >
                    <path
                        fill-rule="evenodd"
                        d="M9.965 11.026a5 5 0 1 1 1.06-1.06l2.755 2.754a.75.75 0 1 1-1.06 1.06l-2.755-2.754ZM10.5 7a3.5 3.5 0 1 1-7 0 3.5 3.5 0 0 1 7 0Z"
                        clip-rule="evenodd"
                    />
                </svg>
            </label>
            <div
                class="mt-5 flex min-h-64 w-full flex-col items-center pb-3"
                id="items"
            >
                @foreach ($unassignedItems as $item)
                    @include("components.order-item-card", ["item" => $item])
                @endforeach
            </div>
        </div>
        @foreach ($tanks as $tank)
            <div
                class="flex h-screen min-w-128 flex-col items-center overflow-scroll bg-base-200"
            >
                <h3 class="mt-2">{{ $tank->name }}</h3>
                <hr class="mb-3" />
                <div
                    class="tanks flex min-h-64 w-full flex-col items-center pb-3"
                    data-tank-id="{{ $tank->id }}"
                >
                    @foreach ($tank->items as $item)
                        @include("components.order-item-card", ["item" => $item])
                    @endforeach
                </div>
            </div>
        @endforeach
    </div>
    <dialog id="moveModal" class="modal">
        <div class="modal-box">
            <form method="dialog">
                <button
                    id="closeModal"
                    class="btn btn-sm btn-circle btn-ghost absolute right-2 top-2"
                >
                    ✕
                </button>
            </form>
            <h3 class="text-lg font-bold">
                Add meg, hogy mennyi viaszt mozgatsz át!
            </h3>
            <p class="py-4">Ha az összeset, akkor csak nyomj OK-t.</p>
            <label
                class="input input-bordered bg-base-200 flex items-center gap-2"
            >
                <input id="modalInput" class="w-full" type="text" name="" />
                <span>kg</span>
            </label>
            <div class="modal-action">
                <form method="dialog">
                    <button id="acceptModal" class="btn">OK</button>
                </form>
            </div>
        </div>
    </dialog>
    <script>
        window.onload = () => {
            var lists = document.querySelectorAll('.tanks, #items');
            let fromContent = '';
            let toContent = '';
            let lastTankId = undefined;

            lists.forEach((list) => {
                Sortable.create(list, {
                    group: 'shared',
                    animation: 150,
                    ghostClass: 'blue-background-class',
                    onStart: (event) => {
                        fromContent = event.from.innerHTML;
                    },
                    onMove: (event) => {
                        if (lastTankId !== event.to.dataset.tankId) {
                            lastTankId = event.to.dataset.tankId;
                            toContent = event.to.innerHTML;
                        }
                    },
                    onEnd: async (event) => {
                        const from = event.from.dataset.tankId;
                        const to = event.to.dataset.tankId;

                        if (from !== to) {
                            const amount = await openModal(
                                event.item.dataset.ownWaxAmount,
                            );

                            if (!amount) {
                                event.from.innerHTML = fromContent;
                                event.to.innerHTML = toContent;

                                return false;
                            }

                            save(event.item.dataset.itemId, from, to, amount);
                        }

                        fromContent = '';
                        toContent = '';
                    },
                });
            });
        };

        const handleMouseUp = async (from, to) => {
            return false;
            console.log('mouseup');
            if (from !== to) {
                const amount = await openModal(event.item.dataset.ownWaxAmount);

                if (!amount) {
                    return false;
                }

                save(event.item.dataset.itemId, from, to, amount);
            }
        };

        const openModal = (maxAmount) => {
            return new Promise((resolve) => {
                modalInput.value = maxAmount;
                moveModal.showModal();

                const handleAccept = () => {
                    const input = modalInput.value;
                    resolve(input);
                };

                acceptModal.addEventListener('click', handleAccept);

                const handleCancel = () => {
                    resolve(false);
                };

                closeModal.addEventListener('click', handleCancel);
            });
        };

        const save = async (itemId, from, to, amount) => {
            await fetch('/move-item', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': '{{ csrf_token() }}',
                },
                body: JSON.stringify({
                    itemId,
                    from,
                    to,
                    amount,
                }),
            });
        };
    </script>
</x-layout>
