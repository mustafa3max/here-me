<div>
    <x-card.secondary>
        <div class="grid grid-cols-1 gap-2">
            <ul class="no-scrollbar flex w-full gap-2 overflow-x-scroll">
                @forelse ($sections as $section)
                    <li><button
                            class="{{ $this->section == $section->id ? 'bg-primary-light dark:bg-primary-dark' : '' }} flex h-12 items-center whitespace-nowrap border-2 border-primary-light px-2 font-extrabold hover:bg-primary-light hover:text-accent-light dark:border-primary-dark dark:hover:bg-primary-dark dark:hover:text-accent-dark"
                            wire:click='selectSection({{ $section->id }})'>{{ $section->section }}</button>
                    </li>
                @empty
                @endforelse
            </ul>
        </div>
    </x-card.secondary>
</div>
