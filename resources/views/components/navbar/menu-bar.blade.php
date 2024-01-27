<div class="z-20 flex flex-col w-full gap-4 border border-primary-light bg-secondary-light p-3 shadow-lg dark:border-primary-dark dark:bg-secondary-dark"
    x-show="isMenu" x-on:click.outside="isMenu = false" x-transition.duration.500ms>

    {{-- Group 1 --}}
    <div class="flex flex-col w-full gap-4 border-b border-primary-light dark:border-primary-dark pb-4 sm:hidden">
        <div x-cloak x-on:click="darkMode = !darkMode;">
            <div x-show="darkMode">
                <button class="flex items-center gap-4 hover:text-accent-light dark:hover:text-accent-dark">
                    <i class="bi bi-moon-fill text-2xl"></i>
                    <span>
                        {{ __('str.light_appearance') }}
                    </span>
                </button>
            </div>
            <div x-show="!darkMode">
                <button class="flex items-center gap-4 hover:text-accent-light dark:hover:text-accent-dark">
                    <i class="bi bi-sun-fill text-2xl"></i>
                    <span>
                        {{ __('str.dark_appearance') }}
                    </span>
                </button>
            </div>
        </div>
    </div>

    <a href="privacy-policy" class="flex items-center gap-4 hover:text-accent-light dark:hover:text-accent-dark">
        <i class="bi bi-shield-fill-check text-2xl"></i>
        <span>
            {{ __('str.policy_and_terms') }}
        </span>
    </a>
</div>
