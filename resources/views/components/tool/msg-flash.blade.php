<div x-data="{ show: '{!! Session::has($name) !!}' }" class="fixed left-0 right-0 top-0 z-50">
    <div class="border-b-4 border-accent bg-secondary-light text-center font-extrabold dark:bg-secondary-dark"
        x-show="show">
        <div class="container mx-auto px-2">
            <div class="flex items-center py-6">
                {{ Session::get($name) }}
                <div class="grow text-start"></div>
                <button x-on:click="show=false" class="rounded-full bg-accent p-3 text-primary-dark"
                    title="{{ __('str.close') }}"><i class="bi bi-x-lg"></i></button>
            </div>
        </div>
    </div>
</div>
