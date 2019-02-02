<template>

    <anchorman-sourcemap-fieldtype v-for="item in structure"
            :title="item.title"
            :source="item.source"
            :value="item.value"
    ></anchorman-sourcemap-fieldtype>

</template>


<style>

    .source-type-select {
        width: 20rem;
    }

    .source-field-select .selectize-dropdown,
    .source-field-select .selectize-input span {
        font-family: 'Menlo', 'Monaco', 'Consolas', 'Liberation Mono', 'Courier New', 'monospace';
        font-size: 12px;
    }

</style>


<script>
export default {

    mixins: [Fieldtype],

    data() {
        return {
            structure: []
        }
    },

    computed: {

    },

    watch: {

    },

    ready() {

        this.structure = Statamic.Publish.mapping;
        // console.log(this.structure);

    }

}
</script>
