<div class="group relative flex h-12 w-full items-center" x-on:click="selectDate">
    <input disabled type="datetime-local" class="z-0 h-12 w-full bg-primary-light p-2 outline-none dark:bg-primary-dark"
        id="date" wire:model='dateScheduling'>
    <div class="absolute end-0 start-0 flex h-12 items-center justify-center text-2xl group-hover:text-accent-light dark:group-hover:text-accent-dark"
        title="{{ __('str.select_date') }}">
    </div>
    <div class="end-0 start-0 flex h-12 w-12 items-center justify-center bg-primary-light text-2xl group-hover:text-accent-light dark:bg-primary-dark dark:group-hover:text-accent-dark"
        title="{{ __('str.select_date') }}">
        <i class="bi bi-calendar-plus-fill"></i>
    </div>
</div>

<script>
    const browserInput = document.getElementById("date");

    function selectDate() {
        browserInput.disabled = false;
        try {
            browserInput.showPicker();
        } catch (error) {
            alert();
        }
        browserInput.disabled = true;
    }
</script>
