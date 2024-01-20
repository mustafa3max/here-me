<div class="w-full h-full overflow-hidden container m-auto flex flex-col" x-data="{ showEmojis: false, emojiTapParent: 'smileys_emotion' }">
    {{-- Chat --}}
    <ul class="flex grow flex-col gap-2 w-full overflow-y-auto px-2 scroll-smooth no-scrollbar border-x border-secondary-light dark:border-secondary-dark">
        <template x-for="(msg, id) in $store.chat.messages">
            <a :id="id" class="flex gap-2" :dir="msg.userId == '{{ Auth::id() }}' ? 'rtl' : 'ltr'">
                <img src="" alt=""
                class="w-10 h-10 rounded-b-full rounded-s-full bg-secondary-light object-cover dark:bg-secondary-dark border-secondary-light dark:border-secondary-dark">

                <div class="flex flex-col gap-2 py-3 px-5 w-fit rounded-e-full rounded-b-full border border-secondary-light dark:border-secondary-dark"
                    :class="msg.userId == '{{ Auth::id() }}' ?
                        'bg-accent-light dark:bg-accent-dark bg-opacity-30 dark:bg-opacity-30' :
                        'bg-secondary-light dark:bg-secondary-dark '">
                    <span x-text="msg.msg"></span>
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
            <input class="h-full bg-transparent outline-none w-full" placeholder="{{ __('str.write_here') }}"
                id="input-msg">
        </div>
        <button
            class="w-14 h-14 rounded-full flex text-primary-light dark:text-primary-dark items-center justify-center bg-accent-light dark:bg-accent-dark"
            onclick="send()">
            <i class="bi bi-send-fill text-xl"></i>
        </button>

            @component('components.tool.emojis', ['emojis' => $emojis])
            @endcomponent
    </div>
</div>

<script>
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
