<div class="no-scrollbar relative flex flex-col justify-stretch gap-2 overflow-y-auto overflow-x-hidden"
    dir="{{ LaravelLocalization::getCurrentLocaleDirection() }}" x-data="{
        user: { name: 'test', avatar: null, typeUser: 0 },
        showInfo: false,
        moreQuestioners: false,
        moreCallers: false,
        alert: false,
        typeAlert: null,
    }">
    {{-- Guests And Navbar --}}
    <div class="flex flex-col gap-2">
        {{-- Navbar --}}
        <div
            class="min-h-14 no-scrollbar flex max-h-14 w-full items-center justify-between gap-2 overflow-x-auto bg-primary-light px-2 dark:bg-primary-dark">
            <x-broadcast.live.btn-nav title="user" icon="people-fill"><span
                    x-text="$store.available.users.length"></span></x-broadcast.live.btn-nav>

            <div class="flex items-center justify-center gap-2">
                {{-- User --}}
                <x-broadcast.live.btn-nav title="{{ __('str.desc_call') }}"
                    icon="person-fill">{{ Auth::user()->name }}</x-broadcast.live.btn-nav>

                {{-- Call --}}
                <div wire:click='callNow'>
                    <x-broadcast.live.btn-nav title="{{ __('str.desc_call') }}"
                        icon="telephone-fill">{{ __('str.call') }}</x-broadcast.live.btn-nav>
                </div>

                {{-- Ask --}}
                <div wire:click='askNow'>
                    <x-broadcast.live.btn-nav title="{{ __('str.i_have_a_question') }}"
                        icon="question-lg">{{ __('str.i_have_a_question') }}</x-broadcast.live.btn-nav>
                </div>
            </div>
        </div>
        {{-- Guests --}}
        <x-card.border-primary>
            <div class="flex flex-col items-center justify-center gap-2">
                <x-text.h-three>{{ __('str.guests') }}</x-text.h-three>
                <div class="w-full border border-primary-light dark:border-primary-dark"></div>
                <ul class="flex flex-wrap justify-center gap-2">
                    @forelse ($guests as $guest)
                        <div class="min-w-24 w-24">
                            @component('components.broadcast.live.user', [
                                'size' => 24,
                                'user' => $guest->user,
                            ])
                            @endcomponent
                        </div>
                    @empty
                    @endforelse
                </ul>
            </div>
        </x-card.border-primary>
    </div>

    {{-- Presenter --}}
    <div class="m-auto flex w-36 grow items-center justify-center">
        <div class="min-w-36 w-36">
            @component('components.broadcast.live.user', [
                'size' => 36,
                'user' => $presenter,
            ])
            @endcomponent
        </div>
    </div>

    {{-- Questioners And Callers --}}
    <div class="grid w-full grid-cols-12 gap-2">
        {{-- Questioners --}}
        <div class="col-span-12 md:col-span-6">
            <x-card.border-primary>
                <div class="flex flex-col gap-2">
                    <div class="flex items-center justify-between">
                        <x-text.h-three>{{ __('str.questioners') }}</x-text.h-three>
                        <div x-on:click="moreQuestioners=!moreQuestioners">
                            <x-button.text>{{ __('str.more') }}</x-button.text>
                        </div>
                    </div>
                    <div class="w-full border border-primary-light dark:border-primary-dark"></div>

                    <ul class="flex justify-around gap-2 overflow-x-auto">
                        @forelse ($questioners as $questioner)
                            <div class="min-w-20 w-20">
                                @component('components.broadcast.live.user', [
                                    'size' => 20,
                                    'user' => $questioner->user,
                                ])
                                @endcomponent
                            </div>
                        @empty
                        @endforelse
                    </ul>
                </div>
            </x-card.border-primary>
        </div>

        {{-- Callers --}}
        <div class="col-span-12 md:col-span-6">
            <x-card.border-primary>
                <div class="flex flex-col gap-2">
                    <div class="flex items-center justify-between">
                        <x-text.h-three>{{ __('str.callers') }}</x-text.h-three>
                        <div x-on:click="moreCallers=!moreCallers">
                            <x-button.text>{{ __('str.more') }}</x-button.text>
                        </div>
                    </div>
                    <div class="w-full border border-primary-light dark:border-primary-dark"></div>

                    <ul class="flex justify-around gap-2 overflow-x-auto">
                        @forelse ($callers as $caller)
                            <div class="min-w-20 w-20">
                                @component('components.broadcast.live.user', [
                                    'size' => 20,
                                    'user' => $caller->user,
                                ])
                                @endcomponent
                            </div>
                        @empty
                        @endforelse
                    </ul>
                </div>
            </x-card.border-primary>
        </div>
    </div>
    <div class="fixed bottom-0 end-0 start-0 top-0 z-10" x-show="showInfo" x-transition.duration.500ms>
        @component('components.broadcast.live.info-user')
        @endcomponent
    </div>

    {{-- More Questioners --}}
    <div class="fixed bottom-0 end-0 start-0 top-0 z-10" x-show="moreQuestioners" x-transition.duration.500ms>
        @component('components.broadcast.live.more', [
            'users' => $questioners,
            'availableUsers' => $broadcast->available_users,
        ])
        @endcomponent
    </div>

    {{-- More Callers --}}
    <div class="fixed bottom-0 end-0 start-0 top-0 z-10" x-show="moreCallers" x-transition.duration.500ms>
        @component('components.broadcast.live.more', [
            'users' => $callers,
            'availableUsers' => $broadcast->available_users,
        ])
        @endcomponent
    </div>

    <x-tool.msg />
    <x-broadcast.live.alert title="block_user" />
</div>
