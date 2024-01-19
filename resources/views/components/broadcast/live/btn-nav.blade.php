<button
    class="{{ $join ?? false ? 'bg-accent-light dark:bg-accent-dark text-primary-light dark:text-primary-dark font-extrabold' : '' }} group flex gap-2 border-2 border-secondary-light p-2 dark:border-secondary-dark"
    title="{{ __('str.' . $title) }}">
    <span>{{ $slot }}</span>
    <i
        class="bi bi-{{ $icon }} {{ $join ?? false ? 'group-hover:text-primary-light dark:group-hover:text-primary-dark' : 'group-hover:text-accent-light dark:group-hover:text-accent-dark' }}"></i>
</button>
