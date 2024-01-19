<form wire:submit='broadcasts' class="flex gap-2">
    <input
        class="block h-12 w-full bg-primary-light px-4 text-lg outline-0 autofill:shadow-[inset_0_0_0px_1000px_rgb(200,200,200)] dark:bg-primary-dark autofill:dark:shadow-[inset_0_0_0px_1000px_rgb(30,30,30)]"
        type="search" placeholder="{{ __('str.search') }}" wire:model='search'>
        <button type="submit">
            <x-button type="fill-primary" title="{{ __('str.search') }}" icon="search" text="" />
        </button>
</form>
