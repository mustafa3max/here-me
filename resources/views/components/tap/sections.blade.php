<x-card.secondary>
    <div class="grid grid-cols-1">
        <div class="flex items-center justify-center gap-2">
            <button class="flex items-center justify-center bg-primary-light p-2 dark:bg-primary-dark"
                onclick="right()"><i class="bi bi-caret-right-fill text-xl"></i></button>
            <ul class="no-scrollbar flex grow items-center justify-center gap-4 overflow-x-scroll" id="sections">
                @forelse ($sections as $section)
                    <li class="whitespace-nowrap font-extrabold hover:text-accent">
                        <button wire:click='selectSection("{{ $section }}")'>{{ $section }}</button>
                    </li>
                @empty
                    {{ __('status.title_no_data') }}
                @endforelse
            </ul>
            <button class="flex items-center justify-center bg-primary-light p-2 dark:bg-primary-dark"
                onclick="left()"><i class="bi bi-caret-left-fill text-xl"></i></button>
        </div>
    </div>
</x-card.secondary>

<script>
    const sections = document.getElementById("sections");

    function right() {
        sections.scrollBy({
            top: 0,
            left: 150,
            behavior: "smooth"
        });
    }

    function left() {
        sections.scrollBy({
            top: 0,
            left: -150,
            behavior: "smooth"
        });
    }
</script>
