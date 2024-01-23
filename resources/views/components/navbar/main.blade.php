<nav class="h-16 bg-secondary-light shadow-md dark:bg-secondary-dark">
    <div class="flex flex-wrap">
        <div class="relative z-20 mx-auto w-full p-2" x-data="{ isMenu: false }">
            <div class="mx-auto flex flex-wrap items-center justify-between">
                <ul class="flex items-center  gap-2 text-2xl">
                    @livewire('ready.join-or-leave')

                    <div x-on:click="isMenu=!isMenu">
                        <x-navbar.btn icon="list" title="drop_list" />
                    </div>

                    <div class="max-sm:hidden">
                        <x-navbar.btn icon="house-door-fill" title="home" href="{{ route('readies') }}" />
                    </div>

                    <div class="max-sm:hidden">
                        <div x-cloak x-on:click="darkMode = !darkMode;">
                            <div x-show="darkMode">
                                <x-navbar.btn icon="moon-fill" title="light_appearance" />
                            </div>
                            <div x-show="!darkMode">
                                <x-navbar.btn icon="sun-fill" title="dark_appearance" />
                            </div>
                        </div>
                    </div>

                    <div class="max-sm:hidden">
                        <x-navbar.btn icon="heart-fill" title="my_interests" href="{{ route('update-interests') }}"/>
                    </div>

                    <x-navbar.alert />

                </ul>

                <div class="max-ss:hidden">
                    <x-image.logo-name left="0" />
                </div>

            </div>
            <div class="absolute start-0 top-16 w-full max-sm:w-full sm:max-w-sm">
                <x-navbar.menu-bar />
            </div>
        </div>
    </div>
</nav>
