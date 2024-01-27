@section('page-index')
    noindex
@endsection

@section('page-title')
    {{ __('seo.title_reset_password') }}
@endsection

@section('page-description')
    {{ __('seo.description_reset_password') }}
@endsection

<div class="flex flex-col gap-2">
    <x-navbar.main />

    <x-card.secondary>
        <form wire:submit="resetPassword" class="grid gap-4">
            <x-text.h-one>{{ __('seo.title_reset_password') }}</x-text.h-one>

            <x-input.one isLabel="1" type="email" model="email" placeholder="{{ __('str.email') }}" />

            <x-input.one isLabel="1" type="password" model="password" placeholder="{{ __('str.password') }}" />

            <x-input.one isLabel="1" type="password" model="passwordConfirmation"
                placeholder="{{ __('str.password_confirmation') }}" />

            <x-input.one type="hiddenq" model="token" />

            <x-button.fill type="submit">{{ __('seo.title_reset_password') }}</x-button.fill>

        </form>

        <div wire:loading.delay>
            <x-tool.wait />
        </div>

        <x-tool.msg />
    </x-card.secondary>

</div>
