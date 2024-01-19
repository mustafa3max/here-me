@section('page-index')
    noindex
@endsection

@section('page-title')
    {{ __('seo.title_profile', ['USER' => $user->name]) }}
@endsection

@section('page-description')
    {{ __('seo.description_profile', ['USER' => $user->name]) }}
@endsection

<div class="grid grid-cols-1 gap-2" x-data="{ search: false, isSearch: false }">
    <x-navbar.main />
    <div class="px-2 pb-2">
        <x-card.secondary>
            @livewire('user.update', ['user' => $user])
            <div class="grid gap-2 pt-4 text-center">
                <h1 class="font-semibold uppercase">{{ $user->name }}</h1>
                <p>{{ $user->email }}</p>

                @if (request('userId') == Auth::id())
                    <div class="flex">
                        <a href="{{ route('logout') }}">
                            <x-button type="link" text="{{ __('str.sign_out') }}" />
                        </a>
                        <div class="grow"></div>
                        <a href="user/delete-account">
                            <x-button type="link" text="{{ __('seo.title_delete_account') }}"/>
                        </a>
                    </div>
                @endif
            </div>
        </x-card.secondary>
    </div>
    <x-tool.msg />
</div>
