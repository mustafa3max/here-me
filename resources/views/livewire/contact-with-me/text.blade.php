<div>
<div class="w-full h-full overflow-hidden container m-auto flex flex-col" x-data="{ showEmojis: false, emojiTapParent: 'smileys_emotion' }">
    {{-- Chat --}}
    <ul class="flex grow flex-col gap-2 w-full overflow-y-auto px-2 scroll-smooth no-scrollbar border-x border-secondary-light dark:border-secondary-dark">
        <template x-for="(msg, id) in $store.chat.messages">
            <a :id="id" class="flex gap-2" :dir="msg.userId == '{{ Auth::id() }}' ? 'rtl' : 'ltr'">
                <img :src="msg.avatar" alt=""
                class="w-10 h-10 rounded-b-full rounded-s-full bg-secondary-light object-cover dark:bg-secondary-dark border-secondary-light dark:border-secondary-dark">
                <div class="flex max-w-80 flex-col gap-2 p-2 w-fit rounded-e-xl rounded-b-xl border border-secondary-light dark:border-secondary-dark"
                    :class="msg.userId == '{{ Auth::id() }}' ?
                        'bg-accent-light dark:bg-accent-dark bg-opacity-30 dark:bg-opacity-30' :
                        'bg-secondary-light dark:bg-secondary-dark '">
                    <template x-if="msg.msg!=null&&msg.image==null">
                        <span x-text="msg.msg"></span>
                    </template>
                    <template x-if="msg.image!=null&&msg.msg==null">
                        <button x-on:click="$store.text.zoom(msg.image)">
                            <img :src="msg.image" class="rounded-t-xl">
                        </button>
                    </template>
                    <div class="border-t w-full border-primary-light dark:border-primary-dark"></div>
                    <span x-text="msg.date" class="text-xs text-center"></span>
                </div>
            </a>
        </template>
        <a id="last"></a>
    </ul>

    {{-- Input --}}
    <div class="flex gap-2 items-center w-full pb-2 relative">
        <div class="bg-secondary-light dark:bg-secondary-dark h-14 grow rounded-full flex items-center gap-2 p-2">
            <button class="w-10 h-10 rounded-full bg-primary-light dark:bg-primary-dark"
                x-on:click="showEmojis=!showEmojis">
                <i class="bi bi-emoji-smile-fill"></i>
            </button>
            <input class="h-full bg-transparent outline-none w-full min-w-0" placeholder="{{ __('str.write_here') }}"
                id="input-msg">
                <button class="w-10 h-10"
                x-on:click="$store.text.showFile=!$store.text.showFile">
                <i class="bi bi-paperclip text-xl"></i>
            </button>
        </div>
        <button
            class="w-14 h-14 rounded-full flex text-primary-light dark:text-primary-dark items-center justify-center bg-accent-light dark:bg-accent-dark"
            onclick="send()">
            <i class="bi bi-send-fill text-xl"></i>
        </button>

        @component('components.tool.emojis', ['emojis' => $emojis])
        @endcomponent

        <x-chat.file/>

    </div>

    <div class="fixed bg-secondary-light dark:bg-secondary-dark top-0 w-full h-full start-0" x-show="$store.text.isZoom">
        <img :src="$store.text.dataImage" alt="" class="w-full h-full object-contain">
        <button class="absolute top-0 start-0 m-2" x-on:click="$store.text.zoom(null)">
            <x-button type="fill-accent" text="" icon="x"/>
        </button>
    </div>
</div>

<script type="module">
    Alpine.store('text', {
        showFile: false,
        dataImage: null,
        isZoom: false,
        zoom(image) {
            this.dataImage = image;
            this.isZoom = image != null;
        }
    });
    window.addToTextArea = function(emoji) {
        let message = document.getElementById("input-msg");
        let start_position = message.selectionStart;
        let end_position = message.selectionEnd;

        message.value = `${message.value.substring(
    0,
        start_position
    )}${emoji}${message.value.substring(
        end_position,
        message.value.length
    )}`;
    };
</script>
</div>
