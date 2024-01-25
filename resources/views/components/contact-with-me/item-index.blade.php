<div class="grid grid-cols-1 gap-2 border-2 border-secondary-light p-2 shadow-md dark:border-secondary-dark group relative hover:border-accent-light dark:hover:border-accent-dark">
    <img src="{{ asset($user->banner??'assets/images/live-dark.svg') }}" alt="{{ $user->title }}"
        class="aspect-square w-full bg-secondary-light dark:bg-secondary-dark object-cover border-2 border-secondary-light dark:border-secondary-dark">

    <div class="flex gap-2 flex-wrap items-center">
        <div class="flex gap-2 border-secondary-light grow dark:border-secondary-dark border-2 items-center ps-1 pe-2 p-1">
            <x-image.circle src="{{ asset($user->avatar??'assets/images/avatar.svg') }}" alt="" type="secondary" size="10"/>
            <span>{{$user->name}}</span>
        </div>

        <button wire:click="createRoom('{{$user->id}}')" class="w-12 group-hover:animate-pulse">
            <x-button type="fill-accent" icon="telephone-fill" title="str.contact_with_me" text=""/>
        </button>
    </div>
    <div title="{{__('str.unavailable')}}" class="bg-accent-light dark:bg-accent-dark absolute w-full h-full bg-opacity-15 dark:bg-opacity-15 flex items-start justify-start" x-show="!Object.values($store.index.usersNow).includes('{{$user->id}}')">
        <div class="rounded-bl-full bg-primary-light dark:bg-primary-dark w-20 h-20 bg-opacity-95 dark:bg-opacity-95 m-[1px]">
            <i class="bi bi-cone-striped text-3xl block p-3"></i>
        </div>
    </div>
    <ul class="flex flex-wrap gap-2">
        {{-- @foreach (array_intersect(Auth::check()?Auth::user()->interests:$user->interests, $user->interests) as $interest ) --}}
        @foreach (array_intersect($user->interests, $user->interests) as $interest )
        <li class="bg-secondary-light dark:bg-secondary-dark p-2 grow flex items-center justify-between gap-2">
            {{__('interests.'.$interest)}}
            <i class="bi bi-heart-fill"></i>
        </li>
        @endforeach
    </ul>
</div>
