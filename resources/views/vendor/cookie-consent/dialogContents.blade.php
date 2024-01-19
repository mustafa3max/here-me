<div
    class="js-cookie-consent cookie-consent fixed bottom-0 w-full border-t-4 border-accent bg-secondary-light bg-opacity-80 dark:bg-secondary-dark dark:bg-opacity-80">
    <div class="mx-auto w-full px-1 py-8 md:w-9/12 lg:w-8/12 xl:w-6/12">
        <div class="grid items-center justify-center gap-4 md:flex">
            <p class="cookie-consent__message text-center font-extrabold">{!! trans('cookie-consent::texts.message') !!}</p>
            <div class="grow"></div>
            <button
                class="js-cookie-consent-agree cookie-consent__agree cursor-pointer border-2 border-accent bg-accent px-8 py-4 text-lg font-extrabold text-primary-light hover:bg-transparent hover:text-accent dark:text-primary-dark hover:dark:text-accent">{{ trans('cookie-consent::texts.agree') }}</button>
        </div>
    </div>
</div>
