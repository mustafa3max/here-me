<div class="grid grid-cols-12 gap-2 px-2">
    <div class="col-span-12 md:col-span-4 lg:col-span-3">
        @if ($side)
                <x-side.main-v-r />
        @endif
    </div>

    <div class="col-span-12 grid grid-cols-1 gap-2 md:col-span-8 lg:col-span-6">
        {{ $slot }}
    </div>

    <div class="col-span-12 md:col-span-12 lg:col-span-3">
        @if ($side)
                <x-side.main-v-l />
        @endif
    </div>
</div>
