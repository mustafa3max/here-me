<div x-show="show" x-data="{show: true}" class="fixed top-0 w-full z-20">
    @if(Session::has($type))
    <div class="w-full bg-primary-light dark:bg-primary-dark p-4 text-center text-2xl font-extrabold border-accent-light dark:border-accent-dark border-b-4 gap-2 flex flex-col items-center justify-center">
        <i class="bi bi-person-x-fill text-6xl"></i>
        {{ Session::get($type) }}
        <button x-on:click='show=false'>
            <x-button type="fill-accent" text="{{__('str.close')}}"/>
        </button>
    </div>
    @endif
</div>
