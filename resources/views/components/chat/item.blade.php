<div class="flex cursor-pointer flex-row gap-2 p-2 hover:bg-primary-light dark:hover:bg-primary-dark">
    <x-image.circle src="{{ asset($chat->avatar) }}" alt="{{ $chat->name }}" size="10" />
    <div class="w-full">
        <div class="flex gap-2">
            <div class="w-fit text-sm opacity-80">{{ $chat->name }}</div>
            <div class="w-fit">{{ $chat->message }}</div>
        </div>
        {{ $chat->created_at }}
        <div>{{ Carbon\Carbon::createFromDate($chat->created_at)->diffForHumans() }}</div>
    </div>
</div>
