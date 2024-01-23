<div class="col-span-12 grid items-center justify-center gap-4 p-2">
    <div class="flex items-center justify-center">
        <img src="{{ asset('assets/images/empty.svg') }}" alt="{{ __('str.empty') }}" class="w-full max-w-sm">
    </div>
    <x-text.h-two>{{ __('status.title_no_data') }}</x-text.h-two>
    <x-text.p>{{ __('status.desc_no_data') }}</x-text.p>
    <a href="{{ session()->get('url-current') }}">
        <x-button type="fill-accent" text="{{ __('str.try_again') }}"/>
    </a>
</div>
