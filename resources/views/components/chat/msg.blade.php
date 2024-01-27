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
                <img :src="msg.image" class="rounded-se-xl">
            </button>
        </template>
        <div class="border-t w-full border-primary-light dark:border-primary-dark"></div>
        <span x-text="msg.date" class="text-xs text-center"></span>
    </div>
</a>
