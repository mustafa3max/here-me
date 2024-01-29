<!DOCTYPE html>
<html dir="rtl" x-data="{ darkMode: localStorage.getItem('dark') === 'true' }" x-init="$watch('darkMode', val => localStorage.setItem('dark', val))" html x-data="{ darkMode: localStorage.getItem('dark') === 'true', dir: '{{ Session::get('locale') == 'ar' ? 'rtl' : 'ltr' }}' }" x-init="$watch('darkMode', val => localStorage.setItem('dark', val))"
    x-bind:class="{ 'dark': darkMode }">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="icon" type="image/x-icon" href="{{ asset('../favicon.png') }}">

    <title>@yield('page-title') - {{ config('app.name') }}</title>
    <meta name="description" content="@yield('page-description')">
    <meta name="keywords" content="@yield('page-keywords')">
    <meta name="author" content="Mustafamax">

    @vite(['resources/css/app.css'])

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
    {{-- Start Font Almarai --}}
    <link rel="preconnect" as="style" href="https://fonts.googleapis.com">
    <link rel="preconnect" as="style" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Almarai:wght@300&display=swap" rel="stylesheet">
    {{-- End Font Almarai --}}
    @livewireStyles()
</head>

<body
    class="bg-primary-light font-almarai text-primary-dark dark:bg-primary-dark dark:text-primary-light flex flex-col gap-2" x-data="{footer:true}">
    <x-navbar.main/>

    <x-containers.side side="-">
        <x-card.secondary>
            @yield('page')
        </x-card.secondary>
    </x-containers.side>

    <x-footer.main/>

    @livewireScripts()
</body>
</html>
