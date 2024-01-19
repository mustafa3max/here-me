<div x-data="{ show: false, timeout: null, data: '' }" x-init="@this.on('{{ $message ?? 'message' }}', (d) => {
    clearTimeout(timeout);
    show = true;
    data = d;
    timeout = setTimeout(() => show = false, 5000);
})" class="fixed left-0 right-0 top-0 z-50">
    <div class="border-b-4 border-accent-light bg-secondary-light text-center font-extrabold dark:border-accent-dark dark:bg-secondary-dark"
        x-show="show">
        <div class="container mx-auto px-2">
            <div class="flex items-center py-6">
                <div class="grow text-start" x-text="data"></div>
                <button x-on:click="show=false;{!! session()->forget('message') !!}"
                    class="rounded-full bg-accent-light p-3 text-primary-dark dark:bg-accent-dark"
                    title="{{ __('str.close') }}"><i class="bi bi-x-lg"></i></button>
            </div>
        </div>
    </div>
</div>
