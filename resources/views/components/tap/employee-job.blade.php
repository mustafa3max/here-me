<div class="">
    <div class="grid grid-cols-12 gap-2">
        <a href="{{ route('employees') }}"
            class="{{ $route == 'employees' ? 'font-bold' : 'bg-opacity-50 dark:bg-opacity-50 border-b-2 border-primary-light p-2 dark:border-primary-dark' }} col-span-12 block bg-secondary-light px-8 py-4 text-center dark:bg-secondary-dark sm:col-span-6 ">
            {{ __('str.employees') }}
        </a>
        <a href="{{ route('jobs') }}"
            class="{{ $route == 'jobs' ? 'font-bold' : 'bg-opacity-50 dark:bg-opacity-50 border-b-2 border-primary-light p-2 dark:border-primary-dark' }} col-span-12 block bg-secondary-light px-8 py-4 text-center dark:bg-secondary-dark sm:col-span-6 ">
            {{ __('str.jobs') }}
        </a>
    </div>
    <div class="bg-secondary-light p-2 dark:bg-secondary-dark">
        {{ $slot }}
    </div>
</div>
