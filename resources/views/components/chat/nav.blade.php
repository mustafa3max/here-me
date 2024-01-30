<div class="bg-secondary-light dark:bg-secondary-dark w-full h-16 flex items-center px-2 gap-2">
    <a href="{{ route('readies') }}">
        <x-button type="link" text="" icon="arrow-right" title="home"/>
    </a>
    <div class="flex gap-2 items-center">
        <img :src="$store.chat.avatarHe" :alt="$store.chat.nameHe" class="bg-primary-light dark:bg-primary-dark rounded-full h-10 w-10">
        <span x-text="$store.chat.nameHe"></span>
    </div>

    <div class="grow"></div>

    <button onclick="call('audio')">
        <x-button type="link" text="" icon="telephone-fill" title="phone"/>
    </button>
    <button onclick="call('video')">
        <x-button type="link" text="" icon="camera-video-fill" title="video"/>
    </button>
</div>
