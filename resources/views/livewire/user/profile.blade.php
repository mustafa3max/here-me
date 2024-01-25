@section('page-index')
    noindex
@endsection

@section('page-title')
    {{ __('seo.title_profile', ['USER' => $user->name]) }}
@endsection

@section('page-description')
    {{ __('seo.description_profile', ['USER' => $user->name]) }}
@endsection

<div class="grid grid-cols-1 gap-2" x-data="{ changeImage: false, }">
    <x-navbar.main />
    <div class="container m-auto flex flex-col gap-2 bg-secondary-light dark:bg-secondary-dark">
        <div class="relative mb-12">
            <div class="relative">
                <img @if ($banner) src="{{ $banner->temporaryUrl() }}" @else src="{{ asset($user->banner??'assets/images/live-dark.svg') }}" @endif alt="" class="w-full aspect-video h-full bg-accent-light dark:bg-accent-dark bg-opacity-30 dark:bg-opacity-30 object-cover max-h-52">
                <button class="absolute top-2 start-2" x-on:click="$store.profile.update('banner', 0)" x-show="$store.profile.isSelect[0]"><x-profile.change-image/></button>
            </div>

            <div class="absolute start-0 end-0 flex items-center justify-center -bottom-1/4">
                <div class="relative">
                <img @if ($avatar) src="{{ $avatar->temporaryUrl() }}" @else src="{{ asset($user->avatar??'assets/images/avatar.svg') }}"
                @endif  alt="" class="aspect-square w-24 h-24 object-cover bg-accent-light dark:bg-accent-dark rounded-full shadow-lg">
                <button class="absolute -start-14 bottom-6" x-on:click="$store.profile.update('avatar', 1)" x-show="$store.profile.isSelect[1]"><x-profile.change-image/></button>
                </div>
            </div>
        </div>
        {{-- Change Avatar Or Banner --}}
        <form wire:submit="changeImage($store.profile.type)" class="p-2 flex flex-wrap gap-2" x-show="$store.profile.changeImage">
            <input x-show="$store.profile.isSelect[1]" class="bg-primary-light dark:placeholder:bg-accent-light block p-1 dark:bg-primary-dark border border-primary-light dark:border-primary-dark grow" type="file" wire:model="avatar" >

            <input x-show="$store.profile.isSelect[0]" class="bg-primary-light dark:placeholder:bg-accent-light block p-1 dark:bg-primary-dark border border-primary-light dark:border-primary-dark grow" type="file" wire:model="banner" >

            <button type="submit" class="grow"><x-button type="fill-primary" text="{{__('str.change_image')}}" icon="upload"/></button>
        </form>

        <div class="flex flex-col gap-2 p-2">
            <p class="text-center">{{ $user->email }}</p>

            <form wire:submit='updateName' class="flex">
                <input class="bg-primary-light min-w-2 disabled:bg-opacity-50 dark:disabled:bg-opacity-50 h-10 grow dark:bg-primary-dark px-2 outline-0" type="text" name="" id="" wire:model='name' x-ref="input">
                <button type="submit" class="w-10 h-10 border-primary-light dark:border-primary-dark border-2" >
                    <i class="bi bi-upload"></i>
                </button>
            </form>

            <div class="flex">
                <button class="bg-primary-light min-w-2 disabled:bg-opacity-50 dark:disabled:bg-opacity-50 h-10 grow dark:bg-primary-dark px-2 outline-0" type="checkbox" name="" id="" wire:click='updateEnabled'>
                    @if (boolval($enabled))
                    <span class="grow">{{__('str.enabled')}}</span>
                    @else
                    <span class="grow">{{__('str.disabled')}}</span>
                    @endif
                </button>
                <button class="w-10 h-10 border-primary-light dark:border-primary-dark border-2">
                    @if (boolval($enabled))
                    <i class="bi bi-check-square-fill text-4xl text-accent-light dark:text-accent-dark flex"></i>
                    @else
                    <i class="bi bi-square text-4xl text-accent-light dark:text-accent-dark flex"></i>
                    @endif
                </button>
            </div>

            <div class="flex flex-wrap gap-2">
                <a href="{{ route('update-interests') }}" class="grow">
                    <x-button type="fill-primary" text="{{__('str.my_interests')}}" icon="heart-fill"/>
                </a>
            </div>

            <div class="grid grid-cols-2 gap-2 items-center justify-center">
                <a href="{{ route('logout') }}" class="col-span-2 sm:col-span-1">
                    <x-button type="link" text="{{ __('str.sign_out') }}" />
                </a>
                <a href="{{ route('delete-account') }}" class="col-span-2 sm:col-span-1">
                    <x-button type="link" text="{{ __('seo.title_delete_account') }}"/>
                </a>
            </div>
        </div>
    </div>
    <x-tool.msg />
    <div wire:loading wire:target="avatar">
        <x-tool.wite />
    </div>

    <x-footer.main />
</div>

<script type="module">
    Alpine.store('profile', {
        type: 'avatar',
        changeImage: false,
        isSelect: [true, true],
        update(type, index) {
            Alpine.store('profile').changeImage=!Alpine.store('profile').changeImage;
            Alpine.store('profile').type=type;
            for (let i = 0; i < Alpine.store('profile').isSelect.length; i++) {
                if (Alpine.store('profile').changeImage) {
                    Alpine.store('profile').isSelect[i]=false;
                }else {
                    Alpine.store('profile').isSelect[i]=true;
                }
            }
            Alpine.store('profile').isSelect[index]=true;
        }
    });
</script>
