@section('page-index')
    noindex
@endsection

@section('page-title')
    {{ __('seo.title_call_me') }}
@endsection

@section('page-description')
    {{ __('seo.description_call_me') }}
@endsection

<div class="flex flex-col w-full gap-2 overflow-hidden h-screen" wire:key='{{$data->id}}'>
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

            <button onclick="call('audio')">
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

    @livewire('contact-with-me.text')

    @livewire('contact-with-me.audio', ['data' =>$data])

    @livewire('contact-with-me.video', ['data' =>$data])

    <div class="absolute top-0 bottom-0 w-full flex items-center justify-center bg-primary-light dark:bg-primary-dark bg-opacity-80 dark:bg-opacity-80" x-show="!$store.chat.readyRember">
        <div class="bg-accent-light dark:bg-accent-dark p-2 flex flex-col items-center justify-center ">
            <div class="text-2xl font-extrabold text-primary-light dark:text-primary-dark animate-pulse p-4">{{__('str.waiting_member')}}</div>
            <a href="{{ route('employees') }}">
            <x-button type="fill-primary" text="{{__('str.leave_room')}}"/>
        </a>
        </div>
    </div>

    <x-tool.msg />
</div>

<script type="module">
    window.roomKey = '{{$data->id}}';
    Alpine.store('chat', {
        type: null,
        messages: [],
        calling: false,
        callingProgress: false,
        currentTime: '00:00:00',
        userId: '{{Auth::id()}}',
        readyRember: false,
    });
</script>
@vite(['resources/js/contact-with-me/main.js','resources/js/contact-with-me/text.js', 'resources/js/contact-with-me/audio.js', 'resources/js/contact-with-me/video.js'])
