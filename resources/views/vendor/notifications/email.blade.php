@component('mail::message')
    <div class="grid grid-cols-1 gap-4">
        {{-- Greeting --}}
        <div class="text-start text-lg font-extrabold text-accent">
            @if (!empty($greeting))
                {{ $greeting }}
            @else
                @if ($level === 'error')
                    {{ __('str.whoops') }}
                @else
                    {{ __('str.hello_dear') }}
                @endif
            @endif
        </div>

        {{-- Intro Lines --}}
        @foreach ($introLines as $line)
            {{ $line }}
        @endforeach

        {{-- Action Button --}}
        <a href="{{ $actionUrl }}" class="block w-fit bg-accent p-4 font-extrabold" style="color: #E0E0E0">
            @isset($actionText)
                {{ $actionText }}
            @endisset
        </a>

        {{-- Outro Lines --}}
        @foreach ($outroLines as $line)
            {{ $line }}
        @endforeach

        {{-- Salutation --}}
        @if (!empty($salutation))
            {{ $salutation }}
        @else
            @lang(__('str.regards')), {{ config('app.name') }}
        @endif

        {{-- Subcopy --}}
        @isset($actionText)
            @component('vendor.mail.html.subcopy')
                @lang(__('str.msg_1') . __('str.msg_2'), ['actionText' => $actionText])
                <br>
                {{-- {{ $displayableActionUrl }}: --}}
                <a href="{{ $actionUrl }}">{{ $actionUrl }}</a>
            @endcomponent
        @endisset
    </div>
@endcomponent
