<div class="flex flex-col gap-2">
    <x-text.h-two>{{__('str.my_chats')}}</x-text.h-two>
    <ul class="flex flex-wrap gap-2">
        @forelse ($rooms as $room)
            <a href="{{ route('call-me', ['id'=> $room->id]) }}" class="bg-primary-light dark:bg-primary-dark p-2 font-extrabold hover:bg-accent-light hover:dark:bg-accent-dark hover:text-primary-light dark:hover:text-primary-dark flex gap-2 items-center justify-center grow">
                <span>{{$room->userMe->name}}</span>
                <i class="bi bi-arrows-collapse-vertical text-lg"></i>
                <span>{{$room->userHe->name}}</span>
            </a>
        @empty

        @endforelse
    </ul>
</div>
