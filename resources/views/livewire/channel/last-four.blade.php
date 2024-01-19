<div class="flex flex-col gap-2">
    <div class="flex flex-wrap items-center justify-around gap-2 md:justify-between">
        <x-text.h-two>{{ __('str.last_four_channels') }}</x-text.h-two>
        <x-button.text
            href="{{ route('channels', ['userId' => request('userId')]) }}">{{ __('str.all_channels') }}</x-button.text>
    </div>
    <ul class="{{ count($channels) > 0 ? '' : '' }} flex flex-wrap gap-2 justify-center">
        @forelse ($channels as $channel)
            <li class="max-w-xs">
                @component('components.broadcast.last-item', ['data' => $channel, 'type' => 'programs'])
                @endcomponent
            </li>
        @empty
            <x-status.empty />
        @endforelse
    </ul>
</div>
