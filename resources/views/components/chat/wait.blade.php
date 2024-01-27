<div class="fixed top-0 bottom-0 w-full flex items-center justify-center bg-primary-light dark:bg-primary-dark bg-opacity-80 dark:bg-opacity-80" x-show="$store.chat.readyMember.length<2">
    <div class="bg-accent-light dark:bg-accent-dark p-2 flex flex-col items-center justify-center ">
        <div class="text-2xl font-extrabold text-primary-light dark:text-primary-dark animate-pulse p-4">{{__('str.waiting_member')}}</div>
        <div class="flex gap-2">
        <a href="{{ route('readies') }}">
            <x-button type="fill-primary" text="{{__('str.leave_room')}}"/>
        </a>
        <button x-on:click='$store.chat.recall()'>
            <x-button type="fill-primary" text="{{__('str.recall')}}"/>
        </button>
    </div>
    </div>
</div>
