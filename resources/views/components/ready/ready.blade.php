<div class="flex flex-col gap-2">
    <div class="grid grid-cols-2 h-16 border border-accent-light dark:border-accent-dark">
        @component('components.ready.btn', ['ready' => $ready, 'isReady'=>true])
        @endcomponent
        @component('components.ready.btn', ['ready' => !$ready, 'isReady'=>false])
        @endcomponent
    </div>
    <div class="bg-secondary-light dark:bg-secondary-dark p-2 flex items-center flex-col justify-center">
        @if ($ready)
        <span class="text-center font-extralight">{{__('str.available.correct')}}</span>
        @else
        <span class="text-center font-extralight">{{__('str.available.mistake')}}</span>
        @endif
    </div>
</div>
