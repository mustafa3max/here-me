<ul class="flex justify-center gap-2" title="{{ __('str.ratings') . ': ' . $ratingsNum }}">
    @foreach ($ratings as $rate)
        @if ($rate >= 1)
            <li>
                @component('components.rating.btn', ['full' => true])
                @endcomponent
            </li>
        @else
            <li>
                @component('components.rating.btn', ['full' => false])
                @endcomponent </li>
        @endif
    @endforeach
</ul>
