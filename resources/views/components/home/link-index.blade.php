<a href="#{{ $id }}" class="px-2 py-4 font-semibold hover:border-accent-light dark:hover:border-accent-dark"
    id="{{ $id }}-link"
    x-on:click="select[0]=false;select[1]=false;select[2]=false;select[3]=false;select[{{ $index }}]=true;">{{ $slot }}</a>
