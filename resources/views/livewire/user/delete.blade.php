@section('page-index')
    noindex
@endsection

@section('page-title')
    {{ __('seo.title_delete_account', ['USER' => $user->name]) }}
@endsection

@section('page-description')
    {{ __('seo.description_delete_account', ['USER' => $user->name]) }}
@endsection

<div class="grid grid-cols-1 gap-2" x-data="{ changeImage: false, }">
    <x-navbar.main />
    <div class="container m-auto flex p-2 flex-col gap-2 bg-secondary-light dark:bg-secondary-dark">
        <x-text.p>{{ __('seo.description_delete_account') }}</x-text.p>
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
            <x-button type="fill-accent" text="{{ __('seo.title_delete_account') }}" />
        </button>
        </form>
    </div>
    <x-tool.msg />

    <div wire:loading.delay wire:target="delete">
        <x-tool.wite />
    </div>

    <x-footer.main />
</div>
