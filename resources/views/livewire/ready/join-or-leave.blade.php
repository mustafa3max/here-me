<a class="hover:text-accent  h-12 w-12 flex items-center justify-center text-primary-light dark:text-primary-dark hover:text-primary-dark dark:hover:text-primary-light cursor-pointer bg-accent-light dark:bg-accent-dark rounded-full hover:bg-primary-light dark:hover:bg-primary-dark"
 :title="$store.joinOrLeave.isJoin?'{{ __('str.leave') }}':'{{ __('str.join') }}'"
wire:click='joinOrleave'>
 <i class="bi text-4xl" :class="$store.joinOrLeave.isJoin?'bi-x':'bi-plus'"></i>
</a>

<script type="module">
    Alpine.store('joinOrLeave', {
        isJoin: '{{Auth::check()&&Auth::user()->ready}}',
    });

    document.addEventListener('livewire:init', () => {
       Livewire.on('is-join', (event) => {
        Alpine.store('joinOrLeave').isJoin = !event.isJoin;
       });
    });
</script>
