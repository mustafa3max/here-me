<div class="flex w-full flex-col items-center justify-center gap-4">
    <div class="flex items-center justify-center">
        <img src="{{ asset('assets/images/empty.svg') }}" alt="{{ __('str.empty') }}" class="w-full max-w-sm">
    </div>
    <x-text.h-two>{{ __('str.title_no_data') }}</x-text.h-two>
    <x-text.p>{{ __('str.desc_no_data') }}</x-text.p>
    <a href="{{ Request::url() }}">
        <x-button.fill>{{ __('str.try_again') }}</x-button.fill>
    </a>
</div>
