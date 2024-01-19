<div class="flex flex-col gap-2">
    <div class="flex flex-wrap items-center justify-around gap-2 md:justify-between">
        <x-text.h-two>{{ __('str.last_four_broadcats') }}</x-text.h-two>
        <x-button.text
            href="{{ route('broadcasts', ['programId' => request('userId')]) }}">{{ __('str.all_broadcasts') }}</x-button.text>
    </div>
    <ul class="{{ count($broadcasts) > 0 ? 'flex' : '' }} flex-wrap gap-2 justify-center">
        @forelse ($broadcasts as $broadcast)
            <li class="grid grid-cols-1 border-2 border-secondary-light dark:border-secondary-dark max-w-xs grow">
                @component('components.broadcast.item-index', ['broadcast' => $broadcast])
                @endcomponent
            </li>
        @empty
            <x-status.empty />
        @endforelse
    </ul>
</div>
