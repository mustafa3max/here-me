<a class="hover:text-accent  h-12 w-12 flex items-center justify-center cursor-pointer hover:rounded-full hover:bg-primary-light dark:hover:bg-primary-dark"
    title="{{ __('str.' . $title) }}" @if ($href ?? null != null) href="{{ $href }}" @endif>
    <i class="bi bi-{{ $icon }}"></i>
</a>
