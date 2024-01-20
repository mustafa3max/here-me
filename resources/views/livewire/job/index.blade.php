<div class="grid grid-cols-1 gap-2" x-data="{ search: false, isSearch: true }">
    <x-navbar.main />
    <x-containers.broadcast>
        @component('components.contact-with-me.sections', ['sections' => $sections])
        @endcomponent
        <x-tap.employee-job route="{{ session()->get('route-name') }}">
            <div class="grid grid-cols-1 gap-2">
                <div x-show="search" class="w-full">
                    <x-tool.search />
                </div>
                <ul class="grid grid-cols-12 gap-2" wire:loading.remove>
                    @forelse ($jobs as $job)
                        <div class="col-span-12 md:col-span-6 lg:col-span-4">
                            @component('components.contact-with-me.item-index', ['data' => $job])
                            @endcomponent
                        </div>
                    @empty
                        <x-status.index-empty />
                    @endforelse
                </ul>
                <div wire:loading class="grow">
                    <x-status.load />
                </div>
                {{ $jobs->links('vendor.livewire.me-tailwind', ['currentPage' => $jobs->currentPage(), 'lastPage' => $jobs->lastPage()]) }}
            </div>
        </x-tap.employee-job>
        <x-tool.msg />
    </x-containers.broadcast>
    <x-footer.main />
</div>
