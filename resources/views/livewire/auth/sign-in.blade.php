@section('page-index')
    noindex
@endsection

@section('page-title')
    {{ __('seo.title_sign_in') }}
@endsection

@section('page-description')
    {{ __('seo.description_sign_in') }}
@endsection
<div x-data="{ search: false, isSearch: false }">
    <x-navbar.main />
    @component('components.containers.auth')
        <x-card.secondary>
            <form wire:submit="signIn" class="grid gap-4">
                <x-text.h-one>{{ __('seo.title_sign_in') }}</x-text.h-one>

                <x-input.one isLabel="1" type="email" model="email" placeholder="{{ __('str.email') }}"></x-input.one>

                <x-input.one isLabel="1" type="password" model="password"
                    placeholder="{{ __('str.password') }}"></x-input.one>

                <div class="flex flex-wrap justify-between">
                    <div class="flex items-center">
                        <input id="checked-checkbox" type="checkbox" wire:model="remember" class="h-4 w-4">
                        <label for="checked-checkbox" class="ms-2 text-sm font-medium">{{ __('str.remember_me') }}</label>
                    </div>

                    <a href="{{ route('password.request') }}">
                    <x-button type="link" text="{{ __('seo.title_forgot_password') }}"/>
                    </a>
                </div>

                <button type="submit">
                <x-button type="fill-accent" icon="login" text="{{ __('seo.title_sign_in') }}"/>
            </button>
                <div class="flex items-center">
                    <span>{{ __('str.not_account') }}</span>
                    <a href="{{ route('sign-up') }}" class="w-fit">
                        <x-button type="link" text="{{ __('str.new_account') }}"/>
                    </a>
                </div>
            </form>

            <div wire:loading.delay>
                <x-tool.wite />
            </div>

            <x-tool.msg-flash name="reset_rassword" />
            <x-tool.msg />

        </x-card.secondary>
    @endcomponent
</div>