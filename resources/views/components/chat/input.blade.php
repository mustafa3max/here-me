<div class="flex gap-2 items-center px-2 w-full relative">
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
