<div class="grid grid-cols-1 border-2 border-secondary-light p-2 shadow-md dark:border-secondary-dark">
    <x-image.banner src="{{ asset($data->banner) }}" alt="{{ $data->title }}" />
    <x-text.h-two>{{ $data->title }}</x-text.h-two>
    <div class="border border-secondary-light dark:border-secondary-dark"></div>
    <x-text.p>{{ $data->description }}</x-text.p>
    <div class="border border-secondary-light dark:border-secondary-dark"></div>

    @if (request('userId') == Auth::id())
        <div class="flex w-full flex-wrap justify-around gap-2 p-2">
            <x-button.text
                href="{{ route('channel-update', ['userId' => $data->id]) }}">{{ __('str.update') }}</x-button.text>
            <x-button.text
                href="{{ route('channel-delete', ['userId' => $data->id]) }}">{{ __('str.delete') }}</x-button.text>
        </div>
    @endif

    <div class="flex flex-wrap justify-between gap-2 bg-secondary-light p-2 text-sm dark:bg-secondary-dark">
        {{-- <div class="flex gap-1" title="{{ __('str.numper_current_visitors') }}">
            <span class="text-accent-light dark:text-accent-dark">{{ __('str.number_episode_guests') }}:</span>
            <span>{{ count($data->guests ?? []) }}</span>
        </div>
        <div class="flex gap-1" title="{{ __('str.numper_current_visitors') }}">
            <span class="text-accent-light dark:text-accent-dark">{{ __('str.number_episode_subscribers') }}:</span>
            <span>{{ count($data->subscribers ?? []) }}</span>
        </div> --}}
        <div class="flex gap-1" title="{{ __('str.numper_current_visitors') }}">
            <span class="text-accent-light dark:text-accent-dark">{{ __('str.number_' . $type) }}:</span>
            <span>3k</span>
        </div>
        <div class="flex gap-1">
            <span class="text-accent-light dark:text-accent-dark">{{ __('str.created_at') }}:</span>
            <span>{{ $data->created_at }}</span>
        </div>
    </div>
</div>
