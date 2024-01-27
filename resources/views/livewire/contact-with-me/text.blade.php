<div class="w-full h-full pb-2">
    <div class="grid grid-cols-12 h-full" x-data="{ showEmojis: false, emojiTapParent: 'smileys_emotion' }">
        {{-- Side Right --}}
        <div class="col-span-12 md:col-span-2 lg:col-span-3 hidden md:block"></div>

        {{-- Body --}}
        <div class="col-span-12 md:col-span-8 lg:col-span-6 overflow-hidden">
            <div class="w-full h-full flex flex-col gap-2 border-x-2 border-secondary-light dark:border-secondary-dark">
                {{-- Chat --}}
                <ul class="p-4 grow h-0 flex flex-col gap-2 overflow-y-scroll scroll-smooth no-scrollbar">
                    <template x-for="(msg, id) in $store.chat.messages">
                        <x-chat.msg/>
                    </template>
                    <a id="last" class="p-8"></a>
                </ul>

                @component('components.chat.input', ['emojis'=> $emojis])
                @endcomponent
            </div>
        </div>

         {{-- Side Left --}}
         <div class="col-span-12 md:col-span-2 lg:col-span-3 hidden md:block"></div>
    </div>

    <x-chat.zoom-image/>
</div>
