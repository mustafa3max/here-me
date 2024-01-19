<div class="flex justify-center gap-1">
    <i class="bi bi-c-circle"></i>
    <span>{{ __('str.copyright') }}</span>
    <a href="{{ route('home') }}"
        class="font-bold text-accent-light hover:underline dark:text-accent-dark">{{ config('app.name') }}</a>
    <span>{{ Carbon\Carbon::now()->year }}</span>
</div>
