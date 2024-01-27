@section('page-title')
    {{ __('seo.title_summary') }}
@endsection

@section('page-description')
    {{ __('seo.description_summary') }}
@endsection

<div class="grid grid-cols-1 gap-2" x-data="{ search: false, isSearch: false }">
    <x-navbar.main />

    <x-containers.side side="">

    </x-containers.side>
</div>
