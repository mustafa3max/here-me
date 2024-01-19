<div class="relative flex flex-col overflow-hidden" dir="{{ LaravelLocalization::getCurrentLocaleDirection() }}">
    <div class="min-h-14 flex max-h-14 items-center justify-center bg-primary-light dark:bg-primary-dark">
        <x-text.h-two>{{ __('str.chat') }}</x-text.h-two>
    </div>
    {{-- Chats --}}
    <div
        class="flex grow flex-col gap-2 overflow-y-scroll scroll-smooth border-x-2 border-primary-light p-2 dark:border-primary-dark">
        @forelse ($chats as $chat)
            @component('components.chat.item', ['chat' => $chat])
            @endcomponent
            @if ($loop->last)
                <div id="end" class="min-h-12"></div>
            @endif
        @empty
        @endforelse
    </div>
    @livewire('chat.create')
</div>

@script
    <script type="module">
        window.Echo.channel('chat-' + $wire.broadcastId).listen("ChatEvent", (e) => {
            $wire.chats();
        });
    </script>
@endscript
