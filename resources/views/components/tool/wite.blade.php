<div
    class="fixed bottom-0 left-0 right-0 top-0 z-50 flex items-center justify-center bg-primary-light bg-opacity-90 p-8 dark:bg-primary-dark dark:bg-opacity-90">
    <div class="grid items-center justify-center gap-4 p-4">
        <div class="flex">
            <div class="grow"></div>
            <img src="{{ asset('assets/images/loading.gif') }}" alt="loading" class="block w-14">
            <div class="grow"></div>
        </div>
        <div class="animate-bounce text-xl font-extrabold">
            {{ __('str.please_wait') }}
        </div>
    </div>
</div>
