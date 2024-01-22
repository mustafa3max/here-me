<!DOCTYPE html>
<html prefix="og: https://ogp.me/ns#" dir="rtl" x-data="{ darkMode: localStorage.getItem('dark') === 'true', dir: '{{ Session::get('locale') == 'ar' ? 'rtl' : 'ltr' }}' }"
    x-init="$watch('darkMode', val => localStorage.setItem('dark', val))" x-bind:class="{ 'dark': darkMode }" class="scroll-smooth"
    lang="ar">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="icon" type="image/x-icon" href="{{ asset('../favicon.ico') }}">
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <title>@yield('page-title') - {{ config('app.name') }}</title>
    <meta name="description" content="@yield('page-description')">
    <meta name="author" content="Point Team">

    <meta property="og:title" content="@yield('page-title')" />
    <meta property="og:description" content="@yield('page-description')" />
    <meta property="og:locale" content="ar" />
    <meta property="og:type" content="website" />
    <meta property="og:url" content="{{ Request::url() }}" />
    <meta property="og:image" content="@yield('social-image', asset('assets/images/bg_image_home.webp'))" />
    <meta property="og:video:type" content="video/mp4." />
    <meta property="og:video" content="{{ asset('assets/videos/bg_video_home.mp4') }}" />
    <meta property="og:video:secure_url" content="{{ asset('assets/videos/langfiles_show.mp4') }}" />
    <meta property="og:video:width" content="720" />
    <meta property="og:video:height" content="576" />

    <meta name="robots" content="@yield('page-index')">


    <style>
        [x-cloak] {
            display: none !important;
        }

        input:-webkit-autofill {
            -webkit-text-fill-color: #666;
            font-weight: bold;
            caret-color: #666;
            border: 1px solid #666;
        }
    </style>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
    {{-- Start Font Almarai --}}
    <link rel="preconnect" as="style" href="https://fonts.googleapis.com">
    <link rel="preconnect" as="style" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Almarai:wght@300&display=swap" rel="stylesheet">
    {{-- End Font Almarai --}}

    @stack('scripts-schema')

    <script type="module">
        Alpine.store('broadcast', {
            dataStream: 'stream null',
        });
    </script>
</head>

<body
    class="relative overflow-x-hidden bg-primary-light font-almarai text-primary-dark dark:bg-primary-dark dark:text-primary-light"
    x-cloak>
    @php
        if(Auth::check()) {
            if(Route::current()->getName() === 'readies'){
                JoinIndexEvent::dispatch(Auth::id(), 'entry');
            }else {
                JoinIndexEvent::dispatch(Auth::id(), 'exit');
            }
        }
    @endphp
    <div class="flex flex-col">
        <div wire:loading>
            <x-tool.loading-bar />
        </div>
        <div class="grow">
            {{ $slot }}
        </div>
    </div>
    @stack('scripts')
    {{-- <script src="https://unpkg.com/@victoryoalli/alpinejs-timeout@1.0.0/dist/timeout.min.js"></script> --}}
</body>

</html>
