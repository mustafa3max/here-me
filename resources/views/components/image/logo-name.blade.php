<div class="w-fit p-2">
    <a href="/" dir="{{ $left ? 'ltr' : 'rtl' }}" class="flex h-9 items-center justify-center gap-2 max-md:hidden"
        title="{{ config('app.name') }}">
        <div class="h-9 text-4xl font-extrabold uppercase">{{ config('app.name') }}</div>
        <x-image.logo size="9" />
    </a>

    <a href="/" class="flex h-9 items-center justify-center gap-2 md:hidden" title="{{ config('app.name') }}">
        <x-image.logo size="9" />
    </a>
</div>
