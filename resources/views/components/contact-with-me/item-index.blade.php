<div class="grid grid-cols-1 gap-2 border-2 border-secondary-light p-2 shadow-md dark:border-secondary-dark relative">
    <x-image.banner src="{{ asset($data->banner??'assets/images/live-dark.svg') }}" alt="{{ $data->title }}" />

    {{-- Title And Description --}}
    <div class="flex flex-col gap-1">
        <x-text.h-two>{{ $data->title }}</x-text.h-two>
        <div class="mx-2 border border-secondary-light dark:border-secondary-dark"></div>
        <x-text.p>{{ $data->description }}</x-text.p>
    </div>

    <div class="flex gap-2 flex-wrap items-center">
        <div class="flex gap-2 border-secondary-light grow dark:border-secondary-dark border-2 items-center ps-1 pe-2 p-1">
            <x-image.circle src="{{ asset($data->user->avatar??'assets/images/avatar.svg') }}" alt="" type="secondary" size="10"/>
            <span>{{$data->user->name}}</span>
        </div>

        <button wire:click="createRoom('{{$data->user_id}}')" class="w-12">
            <x-button type="fill-accent" icon="telephone-fill" title="str.contact_with_me" text=""/>
        </button>
    </div>
    <div title="{{__('str.unavailable')}}" class="bg-accent-light dark:bg-accent-dark absolute w-full h-full bg-opacity-15 dark:bg-opacity-15 flex items-start justify-start" x-show="!Object.values($store.home.usersNow).includes('{{$data->user_id}}')">
        <div class="rounded-bl-full bg-primary-light dark:bg-primary-dark w-20 h-20 bg-opacity-95 dark:bg-opacity-95 m-[1px]">
            <i class="bi bi-cone-striped text-3xl block p-3"></i>
        </div>
    </div>
</div>
