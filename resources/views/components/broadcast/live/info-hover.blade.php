<div class="bg-primary-light p-2 dark:bg-primary-dark">
    {{-- Ratings --}}
    {{-- @livewire('rating.like-deslike.index') --}}
    <div class="flex flex-wrap items-center gap-2">
        <div class="flex h-fit grow flex-wrap items-center justify-center gap-1"
            title="{{ __('str.' . Str::plural('like', 1)) }}">
            <span class="block">{{ Number::abbreviate(1) }}</span>
            <i class="bi bi-hand-thumbs-up block"></i>
        </div>
        <div class="border border-secondary-light py-2 dark:border-secondary-dark"></div>
        <div class="flex h-fit grow flex-wrap items-center justify-center gap-1"
            title="{{ __('str.' . Str::plural('dislike', 34)) }}">
            <span class="block">{{ Number::abbreviate(34) }}</span>
            <i class="bi bi-hand-thumbs-down block"></i>
        </div>
    </div>
</div>
