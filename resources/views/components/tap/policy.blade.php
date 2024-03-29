<div>
    <x-navbar.main />
    <div class="pt-2">
        <x-containers.side side="1">
                <div class="flex flex-col">
                    <div class="flex flex-wrap gap-0.5 ss:gap-4">
                        <a href="/privacy-policy"
                            class="{{ $route == 'privacy-policy' ? 'font-bold' : 'bg-opacity-50 dark:bg-opacity-50 border-b-2 border-primary-light p-2 dark:border-primary-dark' }} block grow bg-secondary-light px-8 py-4 text-center dark:bg-secondary-dark">
                            {{ __('not_seo.title_privacy_policy') }}
                        </a>
                        <a href="/terms-of-service"
                            class="{{ $route == 'terms-of-service' ? 'font-bold' : 'bg-opacity-50 dark:bg-opacity-50 border-b-2 border-primary-light p-2 dark:border-primary-dark' }} block grow bg-secondary-light px-8 py-4 text-center dark:bg-secondary-dark">
                            {{ __('not_seo.title_terms_of_service') }}
                        </a>
                    </div>
                    <div class="bg-secondary-light p-2 dark:bg-secondary-dark grow">
                        {{ $slot }}
                    </div>
                </div>
        </x-containers.side>
    </div>
</div>
