@section('page-index')
    noindex
@endsection

@section('page-title')
    {{ __('seo.title_forgot_password') }}
@endsection

@section('page-description')
    {{ __('seo.description_forgot_password') }}
@endsection

<div x-data="{ search: false, isSearch: false }">
    <x-navbar.main />
    @component('components.containers.auth')
        <x-card.secondary>
            <form wire:submit="forgotPassword" class="grid gap-4">
                <x-text.h-one>{{ __('seo.title_forgot_password') }}</x-text.h-one>

                <x-input.one isLabel="1" type="email" model="email" placeholder="{{ __('str.email') }}"></x-input.one>

                <button type="submit">
                    <x-button type="fill-accent" icon="login" text="{{ __('seo.title_forgot_password') }}"/>
                </button>
            </form>

            <div wire:loading.delay>
                <x-tool.wite />
            </div>

            <x-tool.msg />
        </x-card.secondary>
    @endcomponent
</div>
