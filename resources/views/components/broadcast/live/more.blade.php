<div class="flex h-full flex-col gap-2 bg-primary-light p-2 dark:bg-secondary-dark dark:bg-opacity-90">
    <div class="">
        <x-card.primary>
            <div class="flex w-full justify-between gap-2">
                <div x-show="moreCallers" class="w-fit">
                    <x-text.h-two>{{ __('str.more_callers') }}</x-text.h-two>
                </div>

                <div class="w-fit" x-show="moreQuestioners">
                    <x-text.h-two>{{ __('str.more_questioners') }}</x-text.h-two>
                </div>

                <div class="w-fit" x-on:click="moreQuestioners=false; moreCallers=false">
                    <div><x-button.icon icon="x" title="{{ __('str.close') }}" /></div>
                </div>
            </div>
        </x-card.primary>
    </div>

    <ul class="flex flex-wrap gap-2 overflow-y-auto">
        @foreach ($users as $user)
            <div class="w-20">
                @component('components.broadcast.live.user', [
                    'size' => 20,
                    'user' => $user->user,
                ])
                @endcomponent
            </div>
        @endforeach
    </ul>
</div>
