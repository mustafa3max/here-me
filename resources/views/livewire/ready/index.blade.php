@section('page-title')
    {{ __('str.title_readies') }}
@endsection

@section('page-description')
    {{ __('str.description_readies') }}
@endsection

<div class="grid grid-cols-1 gap-2" x-data="{ search: false, isSearch: false }">
    <x-tool.flash type="delete-account"/>
    <x-navbar.main />
    <x-containers.broadcast>
            <div class="flex flex-col gap-2">
                @component('components.tool.ready', ['ready' => $ready])
                @endcomponent
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
    @livewire('ready.alert')
    </x-containers.broadcast>
    <x-footer.main />
</div>

<script type="module">
    Alpine.store("index", {
        usersNow: [],
        currentPage: '{!!$data->currentPage()!!}',
        userId: '{!!Auth::id()!!}',
        roomId: null,
        refusal() {
            Alpine.store("index").roomId = null;
        },
    });
</script>

@vite('resources/js/ready/index.js')
