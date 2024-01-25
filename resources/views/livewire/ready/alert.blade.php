<div class="fixed bottom-0 z-20 start-0 end-0 p-2 bg-accent-light dark:bg-accent-dark" x-show="$store.index.roomId !== null">
    <div class="flex items-center justify-center gap-2 container m-auto">
        <div class="grow flex items-center gap-2">
            <span class="text-primary-light dark:text-primary-dark font-extrabold" x-text="$store.index.nameHe"></span>
            <span class="text-primary-light dark:text-primary-dark font-extrabold">{{__('str.communicate_you')}}</span>
        </div>
        <button class="animate-pulse" wire:click="createRoom($store.index.userIdHe)">
            <x-button type="fill-primary" text="{{__('str.acceptance')}}"/>
        </button>
        <button x-on:click="$store.index.refusal()">
            <x-button type="fill-secondary" title="{{__('str.refusal')}}" text="" icon="x"/>
        </button>
    </div>
</div>
