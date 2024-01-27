<div class="bg-secondary-light dark:bg-secondary-dark w-full h-16 flex items-center px-2">
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
    <a href="{{ route('readies') }}">
        <x-button type="link" text="" icon="house-door-fill" title="home"/>
    </a>
</div>
