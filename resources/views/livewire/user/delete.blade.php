@section('page-index')
    noindex
@endsection

@section('page-title')
    {{ __('not_seo.title_delete_account', ['USER' => $user->name]) }}
@endsection

@section('page-description')
    {{ __('not_seo.description_delete_account', ['USER' => $user->name]) }}
@endsection

<div class="grid grid-cols-1 gap-2" x-data="{ changeImage: false, }">
    <x-navbar.main />
    <x-containers.side side="1">
        <div class="flex p-2 flex-col gap-2 bg-secondary-light dark:bg-secondary-dark">
            <x-text.p>{{ __('not_seo.description_delete_account') }}</x-text.p>
            <form wire:submit="delete">
                <div>
                    <span class="block pb-2">{{ __('str.email') }}</span>

                    <x-input.one type="email" name="email" placeholder="{{ __('str.email') }}" model="email"/>

                </div>
                <div class="p-2"></div>
                <div>
                    <span class="block pb-2">{{ __('str.password') }}</span>

                    <x-input.one type="password" name="password" placeholder="{{ __('str.password') }}" model="password"/>
                </div>
                <div class="p-2"></div>
                <button type="submit" class="w-full">
                <x-button type="fill-accent" text="{{ __('not_seo.title_delete_account') }}" />
            </button>
            </form>
        </div>
    </x-containers.side>
    <x-tool.msg />

    <div wire:loading.delay>
        <x-tool.wait />
    </div>
</div>
