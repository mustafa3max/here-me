<div class="grid gap-1 border border-primary-light p-2 dark:border-primary-dark" x-data="{ content: '', length: 150 }">
    @if ($isLabel ?? false)
        <label class="ps-1 text-lg font-extrabold" for="{{ $model ?? null }}">{{ $placeholder ?? '' }}</label>
    @endif
    <textarea x-model="content" rows="6" placeholder="{{ $placeholder ?? '' }}"
        @if ($required ?? true) required @endif @if (($disabled ?? null) != null) disabled @endif
        placeholder="{{ $placeholder ?? '' }}" wire:model='{{ $model ?? null }}' id="{{ $model ?? null }}"
        class="w-full bg-primary-light p-4 outline-0 dark:bg-primary-dark"></textarea>
    <div class="">
        <span x-text="length - content.length" x-show="length-content.length>=0"></span>
        <span x-text="150" x-show="length-content.length<0" class="font-extrabold text-delete"></span>
    </div>
    @error($model ?? null)
        <p class="pt-3 text-center">
            <span class="text-code-2-light dark:text-code-2-dark text-lg font-extrabold">{{ __('error.error') }}:</span>
            <span class="font-bold">{{ $message }}</span>
        </p>
    @enderror
</div>
