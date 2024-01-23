@section('page-index')
    noindex
@endsection

@section('page-title')
    {{ __('seo.title_sign_up') }}
@endsection

@section('page-description')
    {{ __('seo.description_sign_up') }}
@endsection

<div x-data="{ search: false, isSearch: false }">
    <x-navbar.main />
    @component('components.containers.auth')
        <x-card.secondary>
            <form wire:submit="signUp" class="grid gap-4">
                <x-text.h-one>{{ __('str.new_account') }}</x-text.h-one>

                <span>{{ __('str.name') }}</span>
                <x-input.one model="name" placeholder="{{ __('str.name') }}"></x-input.one>

                <span>{{ __('str.email') }}</span>

                <x-input.one type="email" model="email" placeholder="{{ __('str.email') }}"></x-input.one>

                <span>{{ __('str.password') }}</span>

                <x-input.one type="password" model="password" placeholder="{{ __('str.password') }}"></x-input.one>

                <div class="flex items-center">
                    {{ __('str.new_account_message') }}
                    <a href="{{ route('terms-of-service') }}"><x-button type="link" text="{{ __('seo.title_terms_of_service') }}"/></a>
                    {{ __('str.and') }}
                    <a href="{{ route('privacy-policy') }}"><x-button type="link" text="{{ __('seo.title_privacy_policy') }}"/></a>
                    .
                </div>

                <button type="submit">
                    <x-button type="fill-accent" text="{{ __('seo.title_sign_up') }}"/>
            </button>

            <div class="flex items-center">
                <span class="text-gray-400">{{ __('str.already_account') }}</span>
                    <a href="{{ route('sign-in') }}">
                        <x-button type="link" href="/sign-in" text="{{ __('seo.title_sign_in') }}"/>
                    </a>
                </div>
            </form>

            <div wire:loading.delay>
                <x-tool.wite />
            </div>

            <x-tool.msg />
        </x-card.secondary>
    @endcomponent
</div>
