@props(['url'])
<a href="{{ $url }}" class="flex items-center justify-center">
    @if (trim($slot) === 'langfiles')
        <img src="{{ asset('assets/images/logo.svg') }}" class="logo" alt="Langfiles Logo">
    @else
        {{ $slot }}
    @endif
</a>
