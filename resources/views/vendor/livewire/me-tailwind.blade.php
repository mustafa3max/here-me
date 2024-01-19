@if ($paginator->hasPages())
    <nav role="navigation" aria-label="Pagination Navigation" class="flex justify-center gap-2 flex-wrap">
        <span>
            {{-- Previous Page Link --}}
            @if ($paginator->onFirstPage())
                <span
                    class="relative inline-flex cursor-default items-center border border-primary-light px-4 py-2 text-sm font-medium text-secondary-dark dark:border-primary-dark dark:text-secondary-light">
                    {!! __('pagination.previous') !!}
                </span>
            @else
                <button wire:click="previousPage" wire:loading.attr="disabled" rel="prev"
                    class="focus:shadow-outline-blue relative inline-flex items-center border border-primary-light bg-secondary-light px-4 py-2 text-sm font-medium text-secondary-dark transition duration-150 ease-in-out hover:bg-accent-light hover:text-primary-light focus:outline-none active:text-secondary-dark dark:border-primary-dark dark:bg-secondary-dark dark:text-secondary-light dark:hover:bg-accent-dark dark:hover:text-primary-dark">
                    {!! __('pagination.previous') !!}
                </button>
            @endif
        </span>

        <span
            class="relative inline-flex cursor-default items-center border border-primary-light px-4 py-2 text-sm font-medium text-secondary-dark opacity-80 dark:border-primary-dark dark:text-secondary-light">
            <span class="font-bold">{{ $currentPage }}</span>
            <i class="px-4 font-bold">/</i>
            <span class="font-bold">{{ $lastPage }}</span>
        </span>

        <span>
            {{-- Next Page Link --}}
            @if ($paginator->hasMorePages())
                <button wire:click="nextPage" wire:loading.attr="disabled" rel="next"
                    class="focus:shadow-outline-blue relative inline-flex items-center border border-primary-light bg-secondary-light px-4 py-2 text-sm font-medium text-secondary-dark transition duration-150 ease-in-out hover:bg-accent-light hover:text-primary-light focus:outline-none active:text-secondary-dark dark:border-primary-dark dark:bg-secondary-dark dark:text-secondary-light dark:hover:bg-accent-dark dark:hover:text-primary-dark">
                    {!! __('pagination.next') !!}
                </button>
            @else
                <span
                    class="relative inline-flex cursor-default items-center border border-primary-light px-4 py-2 text-sm font-medium text-secondary-dark dark:border-primary-dark dark:text-secondary-light">
                    {!! __('pagination.next') !!}
                </span>
            @endif
        </span>
    </nav>
@endif
