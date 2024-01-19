<div class="z-20 grid w-full gap-4 border border-primary-light bg-secondary-light p-3 shadow-lg dark:border-primary-dark dark:bg-secondary-dark"
    x-show="isMenu" x-on:click.outside="isMenu = false" x-transition.duration.500ms>
    @if (Auth::check())
        @if (!Auth::user()->is_guest)
            <a href="{{ route('profile', ['userId' => Auth::id()]) }}"
                class="flex items-center gap-4 hover:text-accent-light dark:hover:text-accent-dark">
                <i class="bi bi-person-bounding-box text-2xl"></i>
                <span>{{ __('str.profile') }}</span>
            </a>
        @endif

        <a href="{{ route('logout') }}"
            class="flex items-center gap-4 hover:text-accent-light dark:hover:text-accent-dark">
            <i class="bi bi-box-arrow-right text-2xl"></i>
            <span>{{ __('str.sign_out') }}</span>
        </a>
    @else
        <a href="{{ route('sign-up') }}"
            class="flex items-center gap-4 hover:text-accent-light dark:hover:text-accent-dark">
            <i class="bi bi-person-plus-fill text-2xl"></i>
            <span>{{ __('seo.title_sign_up') }}</span>
        </a>
        <a href="{{ route('sign-in') }}"
            class="flex items-center gap-4 hover:text-accent-light dark:hover:text-accent-dark">
            <i class="bi bi-box-arrow-in-right text-2xl"></i>
            <span>{{ __('seo.title_sign_in') }}</span>
        </a>
    @endif

    {{-- <ul class="grid gap-4 border-y border-primary-light py-4 dark:border-primary-dark">
        @foreach (LaravelLocalization::getSupportedLocales() as $localeCode => $properties)
            @if (LaravelLocalization::getCurrentLocale() != $localeCode)
                <li>
                    <a rel="alternate" hreflang="{{ $localeCode }}"
                        class="flex items-center gap-4 hover:text-accent-light dark:hover:text-accent-dark"
                        href="{{ LaravelLocalization::getLocalizedURL($localeCode, null, [], true) }}">
                        <i class="bi bi-translate text-2xl"></i>
                        {{ $properties['native'] }}
                    </a>
                </li>
            @endif
        @endforeach
    </ul> --}}

    <a href="privacy-policy" class="flex items-center gap-4 hover:text-accent-light dark:hover:text-accent-dark">
        <i class="bi bi-shield-fill-check text-2xl"></i>
        <span>
            {{ __('str.policy_and_terms') }}
        </span>
    </a>

    {{-- <div class="border-b border-primary-light dark:border-primary-dark"></div> --}}

</div>
