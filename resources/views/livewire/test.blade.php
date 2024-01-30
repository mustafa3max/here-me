<div x-data="{ test: false }" id="test">
    <template x-if="test">
        <h1>H1</h1>
    </template>
    <button x-on:click="test = !test">is test</button>
</div>
