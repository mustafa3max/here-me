<div class="absolute bottom-[60px] left-0 right-0 p-2" x-transition.duration.500ms x-show="$store.text.showFile" x-on:click.outside="$store.text.showFile=false">
    <div x-data="imgPreview" x-cloak class="w-full bg-secondary-light p-2 dark:bg-secondary-dark flex overflow-y-auto z-50 flex-wrap gap-2">
        <template x-if="imgsrc">
            <img :src="imgsrc"  alt="" class="border-2 border-primary-light dark:border-primary-dark w-full max-h-48 object-contain">
        </template>
        <input class="bg-primary-light dark:bg-primary-dark p-1 grow"  type="file" id="imgSelect" accept="image/*" x-ref="myFile" x-on:change="previewFile">
        <button class="grow disabled:opacity-30" :disabled="imgsrc==null" x-on:click='send()'>
            <x-button text="{{__('str.send')}}" type="fill-primary"/>
        </button>
    </div>
</div>

<script type="module">
    Alpine.data('imgPreview', () => ({
        imgsrc:null,
        previewFile() {
            let file = this.$refs.myFile.files[0];
            if(!file || file.type.indexOf('image/') === -1) return;
            this.imgsrc = null;
            let reader = new FileReader();
            reader.onload = e => {
                this.imgsrc = e.target.result;
            }
            reader.readAsDataURL(file);
        },
        send() {
            const timeElapsed = Date.now();
            const today = new Date(timeElapsed);
            const msg = {
                userId: Alpine.store("chat").userId,
                avatar: Alpine.store("chat").avatar,
                msg: null,
                image: this.imgsrc,
                date: today.toLocaleTimeString(),
            };
            this.imgsrc = null;
            Alpine.store("text").showFile = false;
            Alpine.store("chat").messages.push(msg);
            window.insideRoom.whisper("chat", {
                message: msg,
                type: "message",
            });
        }
    }));
</script>
