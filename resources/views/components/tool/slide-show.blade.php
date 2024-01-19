<div class="relative grid h-80 grid-cols-1" x-init="$store.images.images = {{ json_encode($images) }};
$store.images.image = $store.images.images[0]">
    <div class="absolute bottom-0 start-4 top-0 z-40 grid items-center">
        <button
            class="flex h-12 w-12 items-center justify-center bg-primary-light hover:bg-accent dark:bg-primary-dark hover:dark:bg-accent"
            x-on:click="$store.images.add()"><i class="bi bi-caret-right-fill"></i></button>
    </div>
    <div class="relative h-80 min-w-full">
        <img class="absolute z-10 h-80 w-full" :src="'{{ asset('/') }}' + Alpine.store('images').image"
            alt="{{ $title }}">
        <div class="absolute z-20 h-full w-full bg-accent/30 backdrop-blur-md"></div>
        <img class="absolute z-30 h-80 min-w-full object-contain"
            :src="'{{ asset('/') }}' + Alpine.store('images').image" alt="{{ $title }}">
    </div>
    <div class="absolute bottom-0 end-4 top-0 z-40 grid items-center">
        <button
            class="flex h-12 w-12 items-center justify-center bg-primary-light hover:bg-accent dark:bg-primary-dark hover:dark:bg-accent"
            x-on:click="$store.images.clear()"><i class="bi bi-caret-left-fill"></i></button>
    </div>

    <div class="absolute bottom-0 left-0 right-0 z-40 flex items-center justify-center">
        <ul class="flex gap-2 p-2" x-data="{ images: $store.images.images }">
            <template x-for="(image, index) in images">
                <li class="h-3 w-3" :class="index == $store.images.index ? 'bg-accent' : 'border border-accent'"></li>
            </template>
        </ul>
    </div>
</div>

<script>
    document.addEventListener('alpine:init', () => {
        Alpine.store('images', {
            index: 0,
            images: [],
            image: '',

            add() {
                const lenght = this.images.length - 1;
                if (this.index == 0) {
                    this.index = lenght;
                } else {
                    this.index -= 1;
                }
                this.image = this.images[this.index];
            },
            clear() {
                const lenght = this.images.length - 1;
                if (this.index == lenght) {
                    this.index = 0;
                } else {
                    this.index += 1;
                }
                this.image = this.images[this.index];
            }
        })
    });
</script>
