<div class="fixed flex items-center justify-center w-full h-full" x-show="$store.chat.calling&&$store.chat.type=='audio'">
    <div class="bg-primary-light shadow-lg dark:bg-primary-dark gap-2 flex flex-col items-center w-full h-full">
        <audio controls id="local-audio" autoplay class="hidden"></audio>
        <audio controls id="remote-audio" autoplay class="hidden"></audio>
        <div class="w-full h-full relative">
            <div class="absolute left-0 right-0 text-center font-extrabold p-2 bg-secondary-light dark:bg-secondary-dark w-fit my-2 m-auto">
                @if ($data->user_id_me === Auth::id())
                    <span>{{$data->userHe->name}}</span>
                @else
                    <span>{{$data->userMe->name}}</span>
                @endif
                <div x-text="$store.chat.currentTime"></div>
            </div>
            {{--  --}}
            <div class="flex gap-2 absolute bottom-0 left-0 right-0 items-center justify-center p-2 flex-wrap">
                <button x-on:click="call($store.chat.type)" :class="$store.chat.callingProgress?'animate-bounce':''">
                    <x-button type="fill-accent" title="{{__('str.acceptance')}}" text="" icon="telephone-plus-fill"/>
                </button>
                <button x-on:click="refusal()">
                    <x-button type="fill-secondary" title="{{__('str.refusal')}}" text="" icon="telephone-x-fill"/>
                </button>
            </div>
        </div>
    </div>
</div>
