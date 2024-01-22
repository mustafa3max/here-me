<div x-data="{ search: false, isSearch: false }">
    <x-navbar.main />

    <div class="grid grid-cols-6 gap-2 p-2">
        {{-- Info --}}
        <div class="col-span-6 md:col-span-3">
            <x-card.secondary>
                <div class="grid grid-cols-1 gap-2">
                    <x-image.banner src="{{ asset($broadcast->banner) }}" alt="{{ $broadcast->title }}" />

                    <div class="grid grid-cols-1 justify-center">
                        <x-text.h-one>{{ $broadcast->title }}</x-text.h-one>
                        <div class="h-0.5 bg-primary-light dark:bg-primary-dark"></div>
                        <x-text.p>{{ $broadcast->description }}</x-text.p>
                        <x-card.primary>
                            <div class="flex flex-wrap justify-between">
                                <div class="flex flex-wrap items-center">
                                    <div class="text-accent-light dark:text-accent-dark">
                                        {{ __('str.created_at') }}:
                                    </div>
                                    <div>{{ $broadcast->created_at }}</div>
                                </div>
                                <div class="flex flex-wrap items-center">
                                    <div class="text-accent-light dark:text-accent-dark">
                                        {{ __('str.number_guests') }}:
                                    </div>
                                    <div>2</div>
                                </div>
                            </div>
                        </x-card.primary>
                    </div>
                </div>
            </x-card.secondary>
        </div>

        {{-- Add --}}
        <div class="col-span-6 md:col-span-3">
            <x-card.secondary>
                <div class="grid h-fit grid-cols-1 gap-2">
                    {{-- Guests --}}
                    <div class="grid h-fit grid-cols-1">
                        <x-text.h-two>{{ __('str.guests') }}</x-text.h-two>

                        <ul class="flex flex-wrap gap-2">
                            @forelse ($guests??[] as $guest)
                                <li class="grid grow grid-cols-1 gap-2 bg-primary-light p-2 dark:bg-primary-dark">
                                    <div class="flex grow bg-primary-light dark:bg-primary-dark">
                                        <img src="{{ $guest->avatar }}" alt="{{ $guest->name }}"
                                            class="h-14 w-14 border-2 border-secondary-light dark:border-secondary-dark">
                                        <div class="grid grid-cols-1 gap-2">
                                            <span class="px-2 font-extrabold">{{ $guest->user->name }}</span>
                                            <span class="px-2">{{ $guest->user->email }}</span>
                                        </div>
                                    </div>

                                    <div class="grid grid-cols-2 gap-2">
                                        @php
                                            $isOwner = $guest->user->id === Auth::id() || $broadcast->user_id === Auth::id();
                                        @endphp

                                        <a href="{{ route('profile', ['userId' => 1]) }}"
                                            class="col-span-{{ $isOwner ? 1 : 2 }}">
                                            <x-button.fill-secondary>{{ __('str.visit_guest') }}</x-button.fill-secondary>
                                        </a>
                                        <div class="{{ $isOwner ? '' : 'hidden' }} col-span-1"
                                            wire:click='delete("{{ $guest->user->id }}")'>
                                            @if ($isOwner)
                                                <x-button.fill-secondary>{{ __('str.del_guest') }}</x-button.fill-secondary>
                                            @endif
                                        </div>
                                    </div>
                                </li>
                            @empty
                                <div
                                    class="grid h-fit w-full grid-cols-1 border-4 border-primary-light p-2 dark:border-primary-dark">
                                    <x-status.empty />
                                </div>
                            @endforelse
                        </ul>
                    </div>

                    {{-- Add --}}
                    @if ($broadcast->guests_count < 4)
                        @if (Auth::check())
                            @if ($broadcast->user_id == Auth::id())
                                {{-- Add Guest Email --}}
                                <div
                                    class="grid h-fit grid-cols-1 border-4 border-primary-light p-2 dark:border-primary-dark">
                                    <x-text.h-two>{{ __('str.add_guest') }}</x-text.h-two>

                                    <form wire:submit='add' class="grid gap-2">
                                        <x-input.one placeholder="{{ __('str.email_guest') }}" isLabel="1"
                                            model="emailGuest" type="email" />
                                        <x-button.fill type="submit">{{ __('str.add_guest') }}</x-button.fill>
                                    </form>
                                </div>
                            @else
                                {{-- Add Guest Subscription --}}
                                @if (!$isGuest)
                                    <div
                                        class="grid h-fit grid-cols-1 border-4 border-primary-light p-2 dark:border-primary-dark">
                                        <x-text.h-two>{{ __('str.subscribe_guest') }}</x-text.h-two>
                                        <x-text.p>{{ __('str.subscription_terms') }}</x-text.p>
                                        <div wire:click='subscribe'>
                                            <x-button.fill
                                                type='submit'>{{ __('str.agree_and_subscribe') }}</x-button.fill>
                                        </div>
                                    </div>
                                @endif
                            @endif
                        @endif
                    @endif
                </div>
            </x-card.secondary>
        </div>
    </div>

    <x-tool.msg />
</div>
