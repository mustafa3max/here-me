<button wire:click='isReady' class="{{ !$ready?'bg-accent-light dark:bg-accent-dark text-primary-light dark:text-primary-dark':'bg-primary-light dark:bg-primary-dark' }} col-span-1 p-2 font-extrabold" title="{{__($isReady?'str.user_available_now':'str.user_not_available_now')}}" @if ($ready) disabled @endif>
    <i class="bi bi-{{$isReady?'person-fill-check':'person-fill-x'}} {{$ready?'opacity-30':''}} text-4xl"></i>
</button>
