<div class="w-full h-12" title="{{$title??''}}">
    @switch($type)
        @case("link")
            <div class="text-accent-light dark:text-accent-dark hover:border-accent-light h-12 dark:hover:border-accent-dark border border-transparent px-2 font-extrabold w-full flex gap-2 items-center justify-center {{$text==''?'w-12':''}}">
                @if ($text)
                    {{$text}}
                @endif
                @if ($icon??null)
                    <i class="bi bi-{{$icon}} text-xl"></i>
                @endif
            </div>
            @break
        @case("fill-primary")
            <div class="hover:border-accent-light dark:hover:border-accent-dark border border-primary-light dark:border-primary-dark  px-2 bg-primary-light dark:bg-primary-dark hover:text-accent-light w-full h-12 flex gap-2 items-center justify-center dark:hover:text-accent-dark font-extrabold {{$text==''?'w-12':''}}">
                @if ($text)
                    {{$text}}
                @endif
                @if ($icon??null)
                    <i class="bi bi-{{$icon}} text-xl"></i>
                @endif
            </div>
            @break
        @case("fill-secondary")
            <div class="hover:border-accent-light dark:hover:border-accent-dark border border-secondary-light dark:border-secondary-dark  px-2 bg-secondary-light dark:bg-secondary-dark h-12 w-full flex gap-2 items-center justify-center hover:text-accent-light dark:hover:text-accent-dark font-extrabold {{$text==''?'w-12':''}}">
                @if ($text)
                    {{$text}}
                @endif
                @if ($icon??null)
                    <i class="bi bi-{{$icon}} text-xl"></i>
                @endif
            </div>
            @break
        @case("fill-accent")
            <div class="hover:bg-primary-light dark:hover:bg-primary-dark border border-accent-light dark:border-accent-dark  px-2 bg-accent-light dark:bg-accent-dark h-12 w-full flex gap-2 items-center justify-center hover:text-accent-light dark:hover:text-accent-dark font-extrabold text-primary-light dark:text-primary-dark {{$text==''?'w-12':''}}">
                @if ($text)
                    {{$text}}
                @endif
                @if ($icon??null)
                    <i class="bi bi-{{$icon}} text-xl"></i>
                @endif
            </div>
            @break
        @case("border")
            <div class="hover:border-accent-light dark:hover:border-accent-dark border border-primary-dark dark:border-primary-light   px-2 hover:text-accent-light w-full flex gap-2 items-center justify-center h-12 dark:hover:text-accent-dark font-extrabold {{$text==''?'w-12':''}}">
                @if ($text??null)
                    {{$text}}
                @endif
                @if ($icon??null)
                    <i class="bi bi-{{$icon}} text-xl"></i>
                @endif
            </div>
            @break
    @endswitch
</div>
