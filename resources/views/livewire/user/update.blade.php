<div class="grid grid-cols-1 gap-2" x-data="{ showInput: false }">
    <div class="flex items-center justify-evenly">
        @if (request('userId') == Auth::id())
            <div class="" x-on:click="showInput=!showInput">
                <div x-show="!showInput">
                    <x-button type="fill-primary" title="{{ __('str.change_avatar') }}" icon="image" text=""/>
                </div>
                <div x-show="showInput" wire:click='updateAvatar'>
                    <x-button type="fill-primary" title="{{ __('str.change_avatar') }}" icon="cloud-arrow-up-fill" text=""/>
                </div>
            </div>
        @endif
        <div class="">
            @if ($avatar != null)
                <img src="{{ $avatar->temporaryUrl() }}" alt="{{ $user->name }}"
                    class="mx-auto h-24 w-24 border-2 border-primary-light p-1 shadow-sm dark:border-primary-dark">
            @else
                <img src="{{ asset($user->avatar) }}" alt="{{ $user->name }}"
                    class="mx-auto h-24 w-24 border-2 border-primary-light p-1 shadow-sm dark:border-primary-dark">
            @endif
        </div>
        @if (request('userId') == Auth::id())
            <div class="" wire:click='deleteAvatar'>
                <x-button type="fill-primary" title="{{ __('str.delete_avatar') }}" icon="x" text=""/>
            </div>
        @endif

    </div>
    <div x-show="showInput">
        <x-input.one type="file" model="avatar" />
    </div>
</div>
