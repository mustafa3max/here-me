<button class="group flex items-center gap-2 border-4 border-primary-light dark:border-primary-dark">
    <div class="flex items-center justify-center gap-2 bg-primary-light p-2 dark:bg-primary-dark">
        <i class="bi bi-{{ $icon }} text-xl group-hover:text-accent-light group-hover:dark:text-accent-dark"></i>
        <span>{{ $text }}</span>
    </div>
    <div class="flex items-center justify-center pe-2">{{ $number }}</div>
</button>
