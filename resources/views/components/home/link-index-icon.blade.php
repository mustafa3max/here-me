<a href="#{{ $id }}" class="px-2 py-4 font-semibold hover:border-accent-light dark:hover:border-accent-dark"
    title="{{ $title }}" id="{{ $id }}-link"
    x-on:click="select[0]=false;select[1]=false;select[2]=false;select[3]=false;select[{{ $index }}]=true;">
    <span id="{{ $id }}-link-icon">
        <i x-show="select[{{ $index }}]" class="bi bi-record-circle-fill"></i>
        <i x-show="!select[{{ $index }}]" class="bi bi-circle-fill"></i>
    </span>
</a>
