<!DOCTYPE html>
<html dir="rtl" lang="ar">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" type="image/x-icon" href="{{ asset('../favicon.png') }}">

    <title>{{ config('app.name') }}</title>
    @vite('resources/css/app.css')

    {{-- Start Font Almarai --}}
    <link rel="preconnect" as="style" href="https://fonts.googleapis.com">
    <link rel="preconnect" as="style" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Almarai:wght@300&display=swap" rel="stylesheet">
    {{-- End Font Almarai --}}
</head>

<body>
    <div class="h-screen bg-primary-light p-2 font-almarai text-primary-dark sm:p-4 lg:p-8">
        <div class="grid grid-cols-1 gap-2 rounded-lg bg-secondary-light p-8 shadow-lg">
            {{ $header ?? '' }}

            {{ $slot }}

            {{ $subcopy ?? '' }}

            {{ $footer ?? '' }}
        </div>
    </div>
</body>

</html>
