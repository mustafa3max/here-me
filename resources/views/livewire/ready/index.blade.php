<div class="grid grid-cols-1 gap-2" x-data="{ search: false, isSearch: false }">
    <x-navbar.main />
    <x-containers.broadcast>
            <div class="grid grid-cols-1 gap-2">
                <ul class="grid grid-cols-12 gap-2" wire:loading.remove>
                    @forelse ($data as $user)
                        <div class="col-span-12 md:col-span-6 lg:col-span-4">
                            @component('components.contact-with-me.item-index', ['user' => $user])
                            @endcomponent
                        </div>
                    @empty
                    <x-card.secondary>
                        <x-status.index-empty />
                    </x-card.secondary>
                    @endforelse
                </ul>
                <div wire:loading class="grow">
                    <x-status.load />
                </div>
                {{ $data->links('vendor.livewire.me-tailwind', ['currentPage' => $data->currentPage(), 'lastPage' => $data->lastPage()]) }}
            </div>
        <x-tool.msg />
    </x-containers.broadcast>
    <x-footer.main />
</div>

<script type="module">
    Alpine.store("home", {
        usersNow: JSON.parse('{!!$usersNow!!}')??[],
    });

    Echo.channel("join.index").listen("JoinIndexEvent", (e) => {
        Alpine.store("home").usersNow = e.users_now;
    });
</script>
