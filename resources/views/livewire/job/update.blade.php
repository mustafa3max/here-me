<div x-data="{ search: false, isSearch: false }">
    <div class="grid grid-cols-1 gap-2">
        <x-navbar.main />
        <x-containers.broadcast>
            <div class="grid grid-cols-1 gap-2 px-2">
                <x-card.secondary>
                    @component('components.broadcast.item-broadcast', ['broadcast' => $broadcast])
                    @endcomponent
                    <div wire:loading class="grow">
                        <x-status.load />
                    </div>
                </x-card.secondary>
            </div>
        </x-containers.broadcast>
        <x-footer.main />
        <x-tool.msg />
    </div>
</div>
