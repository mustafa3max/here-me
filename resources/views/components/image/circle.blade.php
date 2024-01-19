<div>
    @switch($type)
        @case('primary')
            <img src="{{ $src }}" alt="{{ $alt }}"
                class="w-{{ $size ?? '12' }} h-{{ $size ?? '12' }} rounded-full bg-primary-light object-cover dark:bg-primary-dark border border-primary-light dark:border-primary-dark hover:border-accent-light dark:hover:border-accent-dark">
            @break
        @case('secondary')
            <img src="{{ $src }}" alt="{{ $alt }}"
                class="w-{{ $size ?? '12' }} h-{{ $size ?? '12' }} rounded-full bg-secondary-light object-cover dark:bg-secondary-dark border hover:border-accent-light dark:hover:border-accent-dark border-secondary-light dark:border-secondary-dark">
            @break
    @endswitch
</div>
