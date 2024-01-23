<div class="relative block">
    <x-navbar.btn icon="bell-fill" title="reload_readies" href="{{ route('readies') }}"/>
    <div x-show="$store.home!=null?$store.home.usersNow.length>=1:false" class="text-xs absolute top-0 end-0 w-5 h-5 bg-accent-light dark:bg-accent-dark flex items-center justify-center rounded-full text-primary-light dark:text-primary-dark" x-text="$store.home!=null?$store.home.usersNow.length:0"></div>
</div>
