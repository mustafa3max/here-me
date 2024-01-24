<div class="absolute bottom-[60px] left-0 right-0 p-2" x-transition.duration.500ms x-show="" x-on:click.outside="showEmojis=false">
    <form x-data="imageViewer()" class="w-full bg-secondary-light p-2 dark:bg-secondary-dark flex overflow-y-auto z-50 flex-wrap gap-2">
        <template x-if="imageUrl">
            <img :src="imageUrl"  alt="" class="border-2 border-primary-light dark:border-primary-dark w-full">
        </template>
        <template x-if="!imageUrl">
            <div class="border-2 border-primary-light dark:border-primary-dark w-full"></div>
        </template>
        <input type="file" name="" id="" accept="image/*" class="bg-primary-light dark:bg-primary-dark p-1 grow">
        <button class="grow">
            <x-button text="{{__('str.send')}}" type="fill-primary"/>
        </button>
    </form>
</div>
{{-- showFile --}}

<script>
    function imageViewer(){
        console.log(123);
        return{
            imageUrl: '',
        }
    }
</script>
