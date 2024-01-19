<div class="grid w-full gap-1">
    @if ($isLabel ?? false)
        <label class="" for="{{ $model ?? null }}">{{ $placeholder ?? '' }}</label>
    @endif
    <input type="{{ $type ?? 'text' }}" placeholder="{{ $placeholder ?? '' }}" wire:model='{{ $model ?? null }}'
        id="{{ $model ?? null }}" @if ($required ?? true) required @endif
        @if (($disabled ?? null) != null) disabled @endif
        @if ($isDir ?? false) webkitdirectory directory multiple @endif
        @if ($multiple ?? false) multiple @endif accept="{{ $accept ?? '' }}"
        @if ($type ?? 'text' == 'number') step="any" @endif
        @if ($isOnChange ?? false) onchange="change('{{ $model ?? null }}')" @endif
        @if ($isXModel ?? false) x-model="model" @endif
        class="{{ $circle ?? false ? 'rounded-full' : '' }} block w-full h-12 bg-primary-light px-4 text-lg outline-0 autofill:shadow-[inset_0_0_0px_1000px_rgb(200,200,200)] dark:bg-primary-dark autofill:dark:shadow-[inset_0_0_0px_1000px_rgb(30,30,30)]">
    @error($model ?? null)
        <p class="pt-3 text-center">
            <span class="text-code-2-light dark:text-code-2-dark text-lg font-extrabold">{{ __('error.error') }}:</span>
            <span class="font-bold">{{ $message }}</span>
        </p>
    @enderror
</div>
