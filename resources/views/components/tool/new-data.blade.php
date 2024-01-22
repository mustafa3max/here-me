<div class="fixed bottom-0 left-0 right-0 flex items-center p-2 justify-center" x-show="$store.home.isNewData">
    <div class="p-4 bg-primary-light dark:bg-primary-dark font-extrabold shadow-lg border border-accent-light dark:border-accent-dark flex items-center gap-2 flex-col animate-pulse">
        <span>{{__('str.new_data')}}</span>
        <div class="flex justify-stretch gap-2 w-full">
            <button class="grow" x-on:click="$store.home.newData()">
                <x-button type="link" icon="x" title="" text=""/>
            </button>
            <button class="grow" wire:click='data' x-on:click="$store.home.newData()">
                <x-button type="link" icon="arrow-clockwise" title="" text=""/>
            </button>
        </div>
    </div>
</div>
