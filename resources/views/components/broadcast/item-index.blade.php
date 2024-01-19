<div class="grid grid-cols-1 gap-2 border-2 border-primary-light p-2 shadow-md dark:border-primary-dark">
    <div class="relative">
        <x-image.banner src="{{ asset($employee->banner) }}" alt="{{ $employee->title }}" />
        <button
            class="absolute start-0 top-0 m-2 h-12 w-12 rounded-full hover:bg-secondary-light dark:hover:bg-secondary-dark"
            title="{{ in_array(Auth::id(), $employee->subscribers ?? []) ? __('str.subscribed') : __('str.tell_episode_starts') }}"
            wire:click='tellEpisodeStarts("{{ json_encode($employee->subscribers) }}", {{ $employee->id }})'><i
                class="bi bi-bell{{ in_array(Auth::id(), $employee->subscribers ?? []) ? '-fill' : '' }} text-2xl"></i></button>
    </div>
    {{-- Title And Description --}}
    <div class="bg-primary-light dark:bg-primary-dark">
        <x-text.h-two>{{ $employee->title }}</x-text.h-two>
        <div class="mx-2 border border-secondary-light dark:border-secondary-dark"></div>
        <x-text.p>{{ $employee->description }}</x-text.p>
    </div>
    <div class="flex gap-2 items-center">
        <div class="flex gap-2 border-primary-light dark:border-primary-dark border-2 items-center ps-1 pe-2 p-1">
            <x-image.circle src="" alt="" type="primary" size="10"/>
            <span>{{$employee->user->name}}</span>
        </div>

        <button wire:click="createRoom('{{$employee->user->id}}')" class="grow">
            <x-button type="fill-accent" icon="phone" text="str.call_me"/>
        </button>
    </div>
</div>
