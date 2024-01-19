<div class="grid grid-cols-1 gap-2" x-data="{ search: false, isSearch: true }">
    <x-navbar.main />
    <x-containers.broadcast>
        @component('components.broadcast.sections', ['sections' => $sections])
        @endcomponent
        <x-tap.employee-job route="{{ session()->get('route-name') }}">
            <div class="grid grid-cols-1 gap-2">
                <div x-show="search" class="w-full">
                    <x-tool.search />
                </div>
                <ul class="grid grid-cols-12 gap-2" wire:loading.remove>
                    @forelse ($employees as $employee)
                        <div class="col-span-12 md:col-span-6 lg:col-span-4">
                            @component('components.broadcast.item-index', ['employee' => $employee])
                            @endcomponent
                        </div>
                    @empty
                        <x-status.index-empty />
                    @endforelse
                </ul>
                <div wire:loading class="grow">
                    <x-status.load />
                </div>
                {{ $employees->links('vendor.livewire.me-tailwind', ['currentPage' => $employees->currentPage(), 'lastPage' => $employees->lastPage()]) }}
            </div>
        </x-tap.employee-job>
        <x-tool.msg />
    </x-containers.broadcast>
    <x-footer.main />
</div>
