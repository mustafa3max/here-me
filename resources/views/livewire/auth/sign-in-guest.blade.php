@section('page-index')
    noindex
@endsection

@section('page-title')
    {{ __('seo.title_sign_in_guest') }}
@endsection

@section('page-description')
    {{ __('seo.description_sign_in_guest') }}
@endsection

<div x-data="{ search: false, isSearch: false }">
    <x-navbar.main />
    @component('components.containers.auth')
        <x-card.secondary>
            <form wire:submit="signIn" class="grid gap-4">
                <x-text.h-one>{{ __('seo.title_sign_in_guest') }}</x-text.h-one>

                <x-text.p>{{ __('seo.title_sign_in_guest') }}</x-text.p>

                <x-button.fill type="submit">{{ __('seo.title_sign_in_guest') }}</x-button.fill>

                <div class="flex flex-row justify-between">
                    <div>
                        <span>{{ __('str.msg_sign_in') }}</span>
                        <x-button.text href="{{ route('sign-in') }}">{{ __('seo.sign_in') }}</x-button.text>
                    </div>
                    <div>
                        <span>{{ __('str.msg_new_account') }}</span>
                        <x-button.text href="{{ route('sign-up') }}">{{ __('seo.sing_up') }}</x-button.text>
                    </div>
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
