<form wire:submit='data' class="flex" x-show="search">
    <input
        class="block h-12 w-full border border-accent-light dark:border-accent-dark bg-secondary-light dark:bg-secondary-dark px-4 text-lg outline-0 "
        type="search" placeholder="{{ __('str.search') }}" wire:model='search'>
        <button type="submit">
            <x-button type="fill-accent" title="{{ __('str.search') }}" icon="search" text="" />
        </button>
</form>
