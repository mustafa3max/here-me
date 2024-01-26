<div class="flex flex-col gap-2" x-data="{list:false}" x-on:click.outside="list = false">
    <div class="flex gap-2 max-md:justify-between justify-center px-2 items-center">
        <button class="w-10 h-10 bg-primary-light dark:bg-primary-dark md:hidden hover:text-accent-light dark:hover:text-accent-dark rounded-full" x-on:click="list=!list">
            <i class="bi" :class='list?"bi-caret-up-fill":"bi-caret-down-fill"'></i>
        </button>
        <x-text.h-two>{{__('str.my_chats')}}</x-text.h-two>
    </div>
    <ul class="flex-wrap gap-2" :class="list?'flex':'max-md:hidden flex'">
        @forelse ($rooms as $room)
            <a href="{{ route('call-me', ['id'=> $room->id]) }}" class="bg-primary-light dark:bg-primary-dark p-2 font-extrabold hover:bg-accent-light hover:dark:bg-accent-dark hover:text-primary-light dark:hover:text-primary-dark flex gap-2 items-center justify-center grow">
                <span>{{$room->userMe->name}}</span>
                <i class="bi bi-arrows-collapse-vertical text-lg"></i>
                <span>{{$room->userHe->name}}</span>
            </a>
        @empty
            <div class="flex flex-col justify-center items-center gap-2 grow">
                @if (Auth::check())
                    <x-text.p>{{__('str.not_chats')}}</x-text.p>
                    <a href="{{ route('readies') }}">
                        <x-button type="fill-primary" text="{{__('str.chat_now')}}"/>
                    </a>
                @else
                    <x-text.p>{{__('error.sign_in_first_show_chats')}}</x-text.p>
                    <a href="{{ route('sign-in') }}">
                        <x-button type="fill-primary" text="{{__('error.sign_in')}}"/>
                    </a>
                @endif
            </div>
        @endforelse
    </ul>
</div>
