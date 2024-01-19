<div
    @if ($broadcast->mode === Globals::modes()[2]) class="border-live-light dark:border-live-dark grid grid-cols-1 gap-2 border-4 p-2 shadow-md"
    @elseif ($broadcast->status === null)
    class="border-finish-light dark:border-finish-dark grid grid-cols-1 gap-2 border-2 p-2 shadow-md"
@else
    class="border-primary-light dark:border-primary-dark grid grid-cols-1 gap-2 border-2 p-2 shadow-md" @endif>
    <x-image.banner src="{{ asset($broadcast->banner) }}" alt="{{ $broadcast->title }}" />
    {{-- Title And Description --}}
    <div class="bg-primary-light dark:bg-primary-dark">
        <x-text.h-two>{{ $broadcast->title }}</x-text.h-two>
        <div class="mx-2 border border-secondary-light dark:border-secondary-dark"></div>
        <x-text.p>{{ $broadcast->description }}</x-text.p>
    </div>

    <div class="flex justify-start gap-2 overflow-auto py-1">
        <div class="font-bold text-accent-light dark:text-accent-dark">
            {{ __('str.broadcast_date') }}:
        </div>
        <div class="">
            {{ Carbon\Carbon::createFromDate($broadcast->broadcast_date_at)->diffForHumans() ?? __('str.not_specified') }}
        </div>
    </div>

    <div
        class="flex flex-wrap justify-center gap-2 border-2 border-l-primary-light bg-primary-light p-2 dark:border-primary-dark dark:bg-primary-dark">
        @if (session()->get('route-name') == 'broadcast')
            <div class="flex gap-2" title="{{ __('str.numper_current_visitors') }}">
                <span>2</span>
                <i class="bi bi-person-fill"></i>
            </div>
            <div class="border border-secondary-light dark:border-secondary-dark"></div>
        @endif
        <div class="flex gap-2" title="{{ __('str.number_episode_guests') }}">
            <span>{{ count($broadcast->guests ?? []) }}</span>
            <i class="bi bi-person-vcard-fill"></i>
        </div>
        <div class="border border-secondary-light dark:border-secondary-dark"></div>
        <div class="flex gap-2" title="{{ __('str.number_episode_subscribers') }}">
            <span>{{ count($broadcast->subscribers ?? []) }}</span>
            <i class="bi bi-person-fill-check"></i>
        </div>
    </div>


    <div x-data="{ date: false, broadcastNow: false }">
        {{-- Date Scheduling --}}
        <form wire:submit='scheduling("{{ $broadcast->id }}")' x-show="date" class="flex gap-2">
            <x-tool.datepicker />

            <div x-on:click='date=false'>
                <x-button.fill-icon title="{{ __('str.close') }}" icon="x" />
            </div>
            <x-button.fill-icon type="submit" title="{{ __('str.update_scheduling') }}" icon="pencil-fill" />
        </form>

        {{-- Broadcast Now --}}
        <form wire:submit='broadcastNow("{{ $broadcast->id }}")' x-show="broadcastNow" class="flex gap-2">
            <label
                class="{{ $broadcast->mode === Globals::modes()[2] ? 'border-live-light dark:border-live-dark' : 'border-finish-light dark:border-finish-dark' }} flex grow items-center gap-2 border-4  bg-primary-light px-2 hover:text-accent-light dark:bg-primary-dark dark:hover:text-accent-dark"
                for="isBroadcast">
                <input id="isBroadcast" wire:model='isBroadcast' type="checkbox"
                    class="me-2 bg-primary-light outline-0 dark:bg-primary-dark">
                <span class="block grow">{{ __('str.msg_broadcast_now') }}</span>
            </label>
            <div x-on:click='broadcastNow=false'>
                <x-button.fill-icon title="{{ __('str.close') }}" icon="x" />
            </div>
            <x-button.fill-icon type="submit" title="{{ __('str.update_scheduling') }}" icon="pencil-fill" />
        </form>

        <div class="flex flex-wrap gap-2" x-show="!date && !broadcastNow">
            <div class="grow" x-on:click='date=true'>
                <x-button.icon-text icon="alarm">{{ __('str.broadcast_scheduling') }}</x-button.icon-text>
            </div>
            <div class="grow" x-on:click="broadcastNow=true">
                <x-button.icon-text icon="broadcast">{{ __('str.broadcasting_starts_now') }}</x-button.icon-text>
            </div>
        </div>
    </div>

    <a href="{{ route('add-guest', ['broadcastId' => $broadcast->id]) }}">
        <x-button.fill>{{ __('str.come_in_now') }}</x-button.fill>
    </a>
</div>
