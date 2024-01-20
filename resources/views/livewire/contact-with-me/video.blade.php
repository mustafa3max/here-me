<div class="fixed flex items-center justify-center w-full h-full" x-show="$store.chat.calling && $store.chat.type=='video'">
    <div class="bg-primary-light shadow-lg dark:bg-primary-dark gap-2 flex flex-col items-center w-full h-full">
        <div class="w-full h-full relative">
            <div class="absolute left-0 right-0 text-center font-extrabold p-2 bg-secondary-light dark:bg-secondary-dark w-fit my-2 m-auto">
                @if ($data->user_id_me === Auth::id())
                    <span>{{$data->userHe->name}}</span>
                @else
                    <span>{{$data->userMe->name}}</span>
                @endif
                <div x-text="$store.chat.currentTime"></div>
            </div>
            <video id="remote-video" autoplay class="w-full h-full bg-primary-light dark:bg-primary-dark object-cover"></video>
            {{--  --}}
            <div class="flex gap-2 absolute bottom-0 left-0 right-0 items-center justify-center p-2 flex-wrap">
                <button x-on:click="call($store.chat.type)" :class="$store.chat.callingProgress?'animate-bounce':''">
                    <x-button type="fill-accent" title="{{__('str.acceptance')}}" text="" icon="telephone-plus-fill"/>
                </button>
                <div class="grow flex justify-center">
                    <video id="local-video" autoplay class="bg-accent-light dark:bg-accent-dark w-28 h-28 bottom-0 aspect-square object-cover m-2 shadow-lg"></video>
                </div>
                <button x-on:click="refusal()">
                    <x-button type="fill-secondary" title="{{__('str.refusal')}}" text="" icon="telephone-x-fill"/>
                </button>
            </div>
        </div>
    </div>
</div>
