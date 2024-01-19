<div class="flex flex-col gap-2">
    <div class="flex flex-wrap items-center justify-around gap-2 md:justify-between">
        <x-text.h-two>{{ __('str.last_four_programs') }}</x-text.h-two>
        <x-button.text
            href="{{ route('programs', ['channelId' => request('userId')]) }}">{{ __('str.all_programs') }}</x-button.text>
    </div>
    <ul class="{{ count($programs) > 0 ? '' : '' }} flex flex-wrap justify-center gap-2">
        @forelse ($programs as $program)
            <li class="max-w-xs">
                @component('components.broadcast.last-item', ['data' => $program, 'type' => 'broadcasts'])
                @endcomponent
            </li>
        @empty
            <x-status.empty />
        @endforelse
    </ul>
</div>
