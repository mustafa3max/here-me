@section('page-index')
    noindex
@endsection

@section('page-title')
    {{ __('seo.title_call_me') }}
@endsection

@section('page-description')
    {{ __('seo.description_call_me') }}
@endsection

<div class="flex flex-col w-full gap-2 overflow-hidden h-screen">
    {{-- Chats --}}
    <div class="flex flex-col w-full items-center gap-2 h-full">
        {{-- Navbar --}}
        <div class="bg-secondary-light dark:bg-secondary-dark w-full">
            <div class=" h-16 flex items-center px-2 container m-auto">
            <div class="flex gap-2 items-center">
                <x-image.circle src="" alt="" type="primary" size="10"/>
                @if ($data->user_id_me === Auth::id())
                    <span>{{$data->userHe->name}}</span>
                @else
                <span>{{$data->userMe->name}}</span>
                @endif
            </div>
            <div class="grow"></div>

            <button onclick="call('phone')">
                <x-button type="link" text="" icon="telephone-fill" title="phone"/>
            </button>
            <button onclick="call('video')">
                <x-button type="link" text="" icon="camera-video-fill" title="video"/>
            </button>
            <a href="{{ route('employees') }}">
                <x-button type="link" text="" icon="house-door-fill" title="home"/>
            </a>
        </div>
    </div>

            {{-- Chat --}}
        <ul class="flex h-full flex-col gap-2 w-full overflow-y-auto p-2 container">
            <template x-for="msg in $store.chat.messages">
            <li class="flex gap-2" :dir="msg.userId=='{{Auth::id()}}'?'rtl':'ltr'">
                <x-image.circle src="" alt="" type="primary"/>
                <div class="flex border flex-col gap-2 py-3 bg-primary-light dark:bg-primary-dark px-5 w-fit rounded-e-full rounded-b-full" :class="msg.userId=='{{Auth::id()}}'?'border-accent-light dark:border-accent-dark':'border-primary-light dark:border-primary-dark'">
                    <span x-text="msg.msg"></span>
                    <div class="border-t w-full border-secondary-light dark:border-secondary-dark"></div>
                    <span x-text="msg.date" class="text-xs text-center"></span>
                </div>
            </li>
            </template>
        </ul>

        {{-- Input --}}
        <div class="flex gap-2 items-center w-full p-2 container">
            <div class="bg-secondary-light dark:bg-secondary-dark h-14 grow rounded-full flex items-center gap-2 p-2">
                <button class="w-10 h-10 rounded-full bg-primary-light dark:bg-primary-dark">
                    <i class="bi bi-emoji-smile-fill"></i>
                </button>
                <input class="h-full bg-transparent outline-none w-full" placeholder="{{__('str.write_here')}}" id="input-msg">
                <button class="w-10 h-10 rounded-full bg-primary-light dark:bg-primary-dark">
                    <i class="bi bi-mic"></i>
                </button>
            </div>
            <button class="w-14 h-14 rounded-full flex text-primary-light dark:text-primary-dark items-center justify-center bg-accent-light dark:bg-accent-dark" onclick="send('{{Auth::id()}}')">
                <i class="bi bi-send-fill text-xl"></i>
            </button>
        </div>
    </div>

    {{-- Calling Alert --}}
    <div class="fixed flex items-center justify-center w-full h-full" x-show="$store.chat.calling">
        <div class="bg-primary-light shadow-lg dark:bg-primary-dark gap-2 flex flex-col items-center w-full h-full">
            <audio controls x-show="$store.chat.type=='phone'" id="local-audio" autoplay class="hidden"></audio>
            <audio controls x-show="$store.chat.type=='phone'" id="remote-audio" autoplay class="hidden"></audio>
            <div class="w-full h-full relative">
                <div class="absolute left-0 right-0 text-center font-extrabold p-2 bg-secondary-light dark:bg-secondary-dark w-fit my-2 m-auto">
                    @if ($data->user_id_me === Auth::id())
                        <span>{{$data->userHe->name}}</span>
                    @else
                        <span>{{$data->userMe->name}}</span>
                    @endif
                    <div x-text="$store.chat.currentTime"></div>
                </div>
                <video x-show="$store.chat.type=='video'" id="remote-video" autoplay class="w-full h-full bg-primary-light dark:bg-primary-dark object-cover"></video>
                {{--  --}}
                <div class="flex gap-2 absolute bottom-0 left-0 right-0 items-center justify-center p-2 flex-wrap">
                    <button x-on:click="call($store.chat.type)" :class="$store.chat.callingProgress?'animate-bounce':''">
                        <x-button type="fill-accent" title="{{__('str.acceptance')}}" text="" icon="telephone-plus-fill"/>
                    </button>
                    <div class="grow flex justify-center">
                        <video   video x-show="$store.chat.type=='video'" id="local-video" autoplay class="bg-accent-light dark:bg-accent-dark w-28 h-28 bottom-0 aspect-square object-cover m-2 shadow-lg"></video>
                    </div>
                    <button x-on:click="refusal()">
                        <x-button type="fill-secondary" title="{{__('str.refusal')}}" text="" icon="telephone-x-fill"/>
                    </button>
                </div>
            </div>
        </div>
    </div>

    <x-tool.msg />
</div>

<script type="module">
    window.roomKey = '{{$data->id}}';
    Alpine.store('chat', {
        messages: [],
        calling: false,
        callingProgress: false,
        type: null,
        currentTime: '00:00:00'
    });
</script>
@vite('resources/js/chat.js')
