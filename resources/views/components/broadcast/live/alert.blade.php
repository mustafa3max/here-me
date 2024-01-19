<div class="fixed bottom-0 left-0 right-0 top-0 z-10 flex items-center justify-center bg-primary-light bg-opacity-80 p-2 dark:bg-primary-dark dark:bg-opacity-80"
    x-show="alert">
    <div class="min-w-64 max-w-xl shadow-lg">
        <x-card.secondary>
            <div class="flex flex-col gap-2">
                {{-- Headder --}}
                <x-card.primary>
                    <div class="flex flex-wrap items-center justify-start gap-2">
                        <x-text.h-three>{{ __('str.' . $title) }}</x-text.h-three>
                    </div>
                </x-card.primary>

                {{-- Body --}}
                <div class="" x-text="typeAlert">

                </div>

                {{-- Footer --}}
                <div class="border-t border-primary-light dark:border-primary-dark"></div>
                <div class="flex flex-wrap items-center justify-between gap-2">
                    <div x-on:click="alert=false">
                        <x-button.fill-primary>{{ __('str.cancel') }}</x-button.fill-primary>
                    </div>
                    <div x-on:click="">
                        <x-button.fill>{{ __('str.ok') }}</x-button.fill>
                    </div>
                </div>
            </div>
        </x-card.secondary>
    </div>
</div>
