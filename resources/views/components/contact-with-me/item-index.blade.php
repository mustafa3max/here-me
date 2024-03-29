<div class="grid grid-cols-1 gap-2 border-2 border-secondary-light p-2 shadow-md dark:border-secondary-dark group relative hover:border-accent-light dark:hover:border-accent-dark">

    <img :src="darkMode?'{{ asset($user->banner??'assets/images/live-dark.svg') }}':'{{ asset($user->banner??'assets/images/live-light.svg') }}'" alt="{{ $user->title }}"
        class="aspect-square w-full bg-secondary-light dark:bg-secondary-dark object-cover border-2 h-full border-secondary-light dark:border-secondary-dark">

    <div class="flex gap-2 flex-wrap items-center">
        <div class="flex gap-2 border-secondary-light grow dark:border-secondary-dark border-2 items-center ps-1 pe-2 p-1">
            <div x-show="darkMode">
                <x-image.circle src="{{asset($user->avatar??'assets/images/avatar-dark.svg') }}" alt="" type="secondary" size="10"/>
            </div>
            <div x-show="!darkMode">
                <x-image.circle src="{{asset($user->avatar??'assets/images/avatar-light.svg') }}" alt="" type="secondary" size="10"/>
            </div>
            <span>{{$user->name}}</span>
        </div>

        <button wire:click="createRoom('{{$user->id}}')" class="w-12 group-hover:animate-pulse">
            <x-button type="fill-accent" icon="telephone-fill" title="str.contact_with_me" text=""/>
        </button>
    </div>

    <div title="{{__('str.unavailable', ['USER'=>$user->name])}}" class="bg-accent-light dark:bg-accent-dark justify-stretch absolute w-full h-full bg-opacity-25 dark:bg-opacity-25 flex flex-col items-start" x-show="!Object.values($store.index.usersNow).includes('{{$user->id}}')">
        <div class="group-hover:bg-opacity-100 dark:group-hover:bg-opacity-100 group-hover:bg-accent-light dark:group-hover:bg-accent-dark group-hover:text-primary-light dark:group-hover:text-primary-dark bg-primary-light dark:bg-primary-dark p-6 rounded-b-[50%] bg-opacity-90 dark:bg-opacity-90 text-center gap-4 flex flex-col justify-center items-center w-full shadow-lg">
            {{__('str.unavailable', ['USER'=>$user->name])}}
            <div class="flex gap-2">
                <i class="block bi bi-cone-striped text-3xl mb-1"></i>
                <i class="block bi bi-cone-striped text-4xl mt-1"></i>
                <i class="block bi bi-cone-striped text-3xl mb-1"></i>
            </div>
        </div>
    </div>

    <ul class="flex flex-wrap gap-2">
        @php
            $interests = array_intersect(Auth::check()?Auth::user()->interests:$user->interests, $user->interests);
        @endphp
        @foreach ($interests as $interest)
            <li class="bg-secondary-light dark:bg-secondary-dark p-2 grow flex items-center justify-between gap-2">
                {{__('interests.'.$interest)}}
                <i class="bi bi-heart-fill"></i>
            </li>
        @endforeach
    </ul>
</div>
