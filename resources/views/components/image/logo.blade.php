<img :src="darkMode ? '{{ asset('assets/images/logo-dark.svg') }}' :
    '{{ asset('assets/images/logo-light.svg') }}'"
    alt="{{ __('seo.title_sign_in') }}" class="h-{{ $size }} w-{{ $size }} m-auto mb-4">
