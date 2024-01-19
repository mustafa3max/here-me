<div :class="$store.available.users.includes('{{ $user->id }}') ? 'hover:border-live-light dark:hover:border-live-dark' :
    'dark:hover:border-finish-dark hover:border-finish-light'"
    class="group flex flex-col items-center justify-center rounded-b-[150px] rounded-t-[600px] border-2 border-transparent bg-primary-light hover:cursor-pointer dark:bg-primary-dark"
    x-on:click="showInfo=true;moreQuestioners=false; moreCallers=false; user={{ json_encode($user) }}"
    x-data="{ hoverInfo: false }" @mouseover.prevent="hoverInfo = true" @mouseleave.prevent="hoverInfo = false"
    wire:key='{{ $user->id }}'>

    {{-- Image User --}}
    <div class="w-full p-1">
        <img src="{{ asset($user->avatar ?? 'assets/images/live.svg') }}" alt="{{ $user->name }}"
            :class="$store.available.users.includes('{{ $user->id }}') ?
                'group-hover:border-transparent dark:group-hover:border-transparent border-live-light dark:border-live-dark' :
                'dark:group-hover:border-transparent group-hover:border-transparent border-finish-light dark:border-finish-dark'"
            class="flex aspect-square items-center justify-center overflow-hidden rounded-full border-2 bg-secondary-light object-cover text-center dark:bg-secondary-dark" />
    </div>

    {{-- Info --}}
    <div class="w-{{ $size - 6 }} grow overflow-hidden whitespace-nowrap text-center font-extrabold">
        {{ $user->name }}</div>

    <div class="absolute" x-show="hoverInfo" x-transition.duration.500ms>
        @component('components.broadcast.live.info-hover')
        @endcomponent
    </div>
</div>

@script
    <script type="module">
        Alpine.store('available', {
            users: [],
        });
        const echo = Echo.join(`presence-available.user.${$wire.broadcastId}`).here((users) => {
                $store.available.users = users;
            })
            .joining((user) => {
                const users = Object.keys(echo.pusher.channels.channels[echo.name].members.members);
                $store.available.users = users;
            })
            .leaving((user) => {
                const users = Object.keys(echo.pusher.channels.channels[echo.name].members.members);
                $store.available.users = users;
            })
            .listen('.available_user_event', (user) => {
                const users = Object.keys(echo.pusher.channels.channels[echo.name].members.members);
                $store.available.users = users;
                $wire.broadcast();
                console.log(12323);
            });
    </script>
@endscript
