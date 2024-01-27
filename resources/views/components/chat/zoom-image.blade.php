<div class="fixed bg-secondary-light dark:bg-secondary-dark top-0 w-full h-full start-0 end-0" x-show="$store.text.isZoom">
    <img :src="$store.text.dataImage" alt="" class="w-full h-full object-contain">
    <button class="absolute top-0 start-0 m-2" x-on:click="$store.text.zoom(null)">
        <x-button type="fill-accent" text="" icon="x"/>
    </button>
</div>
