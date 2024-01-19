<div class="flex w-full border border-primary-light p-2 dark:border-primary-dark">
    {!! $share !!}
    <div class="flex grow items-center justify-center">
        <div class="grow"></div>
        <a href="{{ route('call_us') }}">
            <x-button.fill-icon title="{{ __('str.call_us') }}" icon="telephone-fill" />
        </a>
    </div>
</div>
