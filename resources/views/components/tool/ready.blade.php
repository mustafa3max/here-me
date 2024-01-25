<div class="grid grid-cols-2 border border-accent-light dark:border-accent-dark">
    @component('components.tool.ready-btn', ['ready' => $ready, 'isReady'=>true])
    @endcomponent
    @component('components.tool.ready-btn', ['ready' => !$ready, 'isReady'=>false])
    @endcomponent
</div>
