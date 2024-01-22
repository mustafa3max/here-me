<nav class="h-16 bg-secondary-light shadow-md dark:bg-secondary-dark">
    <div class="flex flex-wrap">
        <div class="relative z-20 mx-auto w-full p-2" x-data="{ isMenu: false }">
            <div class="mx-auto flex flex-wrap items-center justify-between">
                <ul class="flex items-center  gap-2 text-2xl">
                    <div x-on:click="isMenu=!isMenu">
                        <x-navbar.btn icon="list" title="drop_list" />
                    </div>

                    <x-navbar.btn icon="house-door-fill" title="home" href="{{ route('readies') }}" />

                    <div x-cloak x-on:click="darkMode = !darkMode;">
                        <div x-show="darkMode">
                            <x-navbar.btn icon="moon-fill" title="light_appearance" />
                        </div>
                        <div x-show="!darkMode">
                            <x-navbar.btn icon="sun-fill" title="dark_appearance" />
                        </div>
                    </div>

                    <div x-show="isSearch" x-on:click="search = !search">
                        <div x-show="!search">
                            <x-navbar.btn icon="search" title="open_search" />
                        </div>
                        <div x-show="search">
                            <x-navbar.btn icon="x-lg" title="close_search" />
                        </div>
                    </div>
                </ul>

                <div class="max-ss:hidden">
                    <x-image.logo-name left="0" />
                </div>

            </div>
            <div class="absolute start-0 top-16 w-full max-w-sm">
                <x-navbar.menu-bar />
            </div>
        </div>
    </div>
</nav>
