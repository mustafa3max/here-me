<div class="grid grid-cols-1 gap-2 border-2 border-primary-light p-2 shadow-md dark:border-primary-dark">
    <x-image.banner src="{{ asset($data->banner??'assets/images/live-dark.svg') }}" alt="{{ $data->title }}" />

    {{-- Title And Description --}}
    <div class="bg-primary-light dark:bg-primary-dark">
        <x-text.h-two>{{ $data->title }}</x-text.h-two>
        <div class="mx-2 border border-secondary-light dark:border-secondary-dark"></div>
        <x-text.p>{{ $data->description }}</x-text.p>
    </div>

    <div class="flex gap-2 flex-wrap items-center">
        <div class="flex gap-2 border-primary-light grow dark:border-primary-dark border-2 items-center ps-1 pe-2 p-1">
            <x-image.circle src="{{ asset($data->user->avatar??'assets/images/avatar.svg') }}" alt="" type="primary" size="10"/>
            <span>{{$data->user->name}}</span>
        </div>

        <button wire:click="createRoom('{{$data->user->id}}')" class="w-12">
            <x-button type="fill-accent" icon="telephone-fill" title="str.contact_with_me" text=""/>
        </button>
    </div>
</div>
