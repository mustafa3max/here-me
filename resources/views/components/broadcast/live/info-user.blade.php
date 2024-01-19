<div
    class="grid h-full w-full items-center justify-center overflow-y-auto bg-primary-light bg-opacity-90 dark:bg-primary-dark dark:bg-opacity-90">

    <div class="flex w-fit flex-col items-center justify-center gap-1 p-8">
        <div class="w-full">
            <div class="w-fit" x-on:click="showInfo=false">
                <div><x-button.fill-icon-secoandry icon="x" title="{{ __('str.close') }}" /></div>
            </div>
        </div>
        <div class="flex w-full items-center justify-center">
            <div class="flex flex-wrap gap-2 bg-secondary-light p-2 shadow-lg dark:bg-secondary-dark">
                <img :src="location.origin + '/' + (user.avatar ?? 'assets/images/live.svg')" :alt="user.name"
                    class="min-w-24 aspect-square h-60 grow border-2 border-primary-light dark:border-primary-dark">
                <div class="flex h-60 grow flex-col gap-2">
                    <div x-text="user.name"
                        class="flex grow items-center justify-center bg-primary-light p-2 font-extrabold dark:bg-primary-dark">
                    </div>
                    {{-- Block Or Mute --}}
                    @if ($this->broadcastData->user_id === Auth::id())
                        <div class="flex flex-wrap gap-2">
                            <div class="grow" x-on:click="alert=true;typeAlert='block'">
                                <x-button.fill-icon-text icon="" text="{{ __('str.block_user') }}" />
                            </div>
                            <div class="grow" x-on:click="alert=true;typeAlert='mute'">
                                <x-button.fill-icon-text icon="" text="{{ __('str.mute_user') }}" />
                            </div>
                        </div>
                    @endif

                    <div class="flex w-full flex-wrap justify-center gap-2">
                        @component('components.broadcast.live.dis-like', [
                            'icon' => 'hand-thumbs-up',
                            'number' => 345,
                            'text' => __('str.like'),
                        ])
                        @endcomponent
                        @component('components.broadcast.live.dis-like', [
                            'icon' => 'hand-thumbs-down',
                            'number' => 345,
                            'text' => __('str.dislike'),
                        ])
                        @endcomponent
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
