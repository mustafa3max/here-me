 <div class="absolute bottom-[60px] left-0 right-0 p-2" x-transition.duration.500ms x-show="showEmojis"
     x-on:click.outside="showEmojis=false">
     <div class="w-full bg-secondary-light p-2 dark:bg-secondary-dark flex flex-col overflow-y-auto z-50" x-data="{ emojisAll: JSON.parse('{{ json_encode($emojis) }}') }">
         <ul class="no-scrollbar flex flex-wrap gap-2" x-data="{ emojisTap: Object.keys(emojisAll) }">
             <div x-on:click="showEmojis=false">
                 <x-button text="" icon="x" title="{{ __('str.close') }}" type="link"/>
             </div>
             @foreach (array_keys($emojis) as $emoji)
                 <button type="button" class="p-2 hover:text-accent-light dark:hover:text-accent-dark"
                     :class="'{{$emoji}}' == emojiTapParent ? 'text-accent-light dark:text-accent-dark' : ''"
                     x-on:click="emojiTapParent='{{$emoji}}'">{{__('emojis.'.$emoji)}}</button>
             @endforeach
         </ul>
         <ul class="no-scrollbar min-h-80 flex max-h-80 flex-wrap gap-2 overflow-y-auto px-2">
             <template x-for="emoji in Object.values(emojisAll[[emojiTapParent]])" class="h-fit">
                 <button type="button"
                     class="h-10 w-10 rounded-lg bg-secondary-light hover:bg-primary-light dark:bg-secondary-dark dark:hover:bg-primary-dark"
                     x-text="emoji.emoji" x-on:click="window.addToTextArea(emoji.emoji)">
                 </button>
             </template>
         </ul>
     </div>
 </div>
