@section('page-index')
    noindex
@endsection

@section('page-title')
    {{ __('not_seo.title_email_verify') }}
@endsection

@section('page-description')
    {{ __('not_seo.description_email_verify') }}
@endsection

<div class="flex flex-col gap-2">

    <x-navbar.main />

    <x-containers.side side="0">
        <x-card.secondary>
            <div class="grid grid-cols-1 items-center justify-center gap-10 p-8 text-center">
                <x-text.h-one>{{ __('not_seo.title_email_verify') }}</x-text.h-one>
                <div class="mb-6 border-b-2"></div>
                <div class="text-accent flex justify-center text-center">
                    <img src="{{ asset('assets/images/email_verify.svg') }}" alt="">
                </div>
                <p class="text-xl">
                    {{ __('str.send_code_email') }}
                    {{ __('not_seo.description_email_verify') }}
                </p>

                <span class="font-extrabold">{{ __('str.not_verification_code') }} <button class="text-accent hover:underline"
                        wire:click='resendCode'>{{ __('str.resend') }}</button></span>
            </div>
        </x-card.secondary>
    </x-containers.side>

    <div wire:loading.delay>
        <x-tool.wait />
    </div>
</div>
