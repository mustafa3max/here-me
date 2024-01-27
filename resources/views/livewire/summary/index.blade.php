@section('page-title')
    {{ __('seo.title_summaries') }}
@endsection

@section('page-description')
    {{ __('seo.description_summaries') }}
@endsection

<div class="grid grid-cols-1 gap-2" x-data="{ search: false, isSearch: false }">
    <x-navbar.main />

    <x-containers.side side="">
        <div class="flex flex-col gap-2">
            <ul class="grid grid-cols-12 gap-2" wire:loading.remove>

                @forelse ($dataAll as $data)
                @php
                    $title = explode('summaries/summaries/', $data->summary)[1];
                    $title = explode('.', $title)[0];
                @endphp
                    <div class="col-span-12 md:col-span-6">
                        @component('components.summaries.item-index', ['data' => $data, 'sections' => $sections, 'title'=> $title])
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

            {{ $dataAll->links('vendor.livewire.me-tailwind', ['currentPage' => $dataAll->currentPage(), 'lastPage' => $dataAll->lastPage()]) }}
        </div>
    </x-containers.side>
</div>
