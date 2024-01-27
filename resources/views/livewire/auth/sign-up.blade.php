@section('page-index')
    noindex
@endsection

@section('page-title')
    {{ __('not_seo.title_sign_up') }}
@endsection

@section('page-description')
    {{ __('not_seo.description_sign_up') }}
@endsection

<div class="flex flex-col gap-2">
    <x-navbar.main />

    <x-containers.side side="0">
        <x-card.secondary>
            <form wire:submit="signUp" class="grid gap-4">
                <x-text.h-one>{{ __('str.new_account') }}</x-text.h-one>

                <span>{{ __('str.name') }}</span>
                <x-input.one model="name" placeholder="{{ __('str.name') }}"></x-input.one>

                <span>{{ __('str.email') }}</span>

                <x-input.one type="email" model="email" placeholder="{{ __('str.email') }}"></x-input.one>

                <span>{{ __('str.password') }}</span>

                <x-input.one type="password" model="password" placeholder="{{ __('str.password') }}"></x-input.one>

                <div class="flex items-center flex-wrap">
                    {{ __('str.new_account_message_1') }}
                    <a href="{{ route('terms-of-service') }}"><x-button type="link" text="{{ __('not_seo.title_terms_of_service') }}"/></a>
                    {{ __('str.and') }}
                    <a href="{{ route('privacy-policy') }}"><x-button type="link" text="{{ __('not_seo.title_privacy_policy') }}"/></a>
                    {{ __('str.new_account_message_2') }}
                    .
                </div>

                <button type="submit">
                    <x-button type="fill-accent" text="{{ __('not_seo.title_sign_up') }}"/>
            </button>

            <div class="flex items-center">
                <span class="text-gray-400">{{ __('str.already_account') }}</span>
                    <a href="{{ route('sign-in') }}">
                        <x-button type="link" href="/sign-in" text="{{ __('not_seo.title_sign_in') }}"/>
                    </a>
                </div>
            </form>

            <div wire:loading.delay>
                <x-tool.wait />
            </div>

            <x-tool.msg />
        </x-card.secondary>
    </x-containers.side>
</div>
