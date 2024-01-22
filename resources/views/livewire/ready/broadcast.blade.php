<div>
    <x-broadcast.split>
        <x-slot name="chat">
            @livewire('chat.index')
        </x-slot>
        <x-slot name="chat2">
            @livewire('chat.index')
        </x-slot>
        <x-slot name="broadcast">
            @livewire('broadcast.live')
        </x-slot>
        <x-slot name="broadcast2">
            @livewire('broadcast.live')
        </x-slot>
    </x-broadcast.split>
</div>
