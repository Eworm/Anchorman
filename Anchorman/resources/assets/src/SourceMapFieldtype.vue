<template>

    <div class="mb-3">

        <label class="block">
            {{ title | capitalize }}
        </label>

        <div class="flex">

            <div class="source-type-select pr-2">
                <select-fieldtype :data.sync="source" :options="sourceTypeSelectOptions"></select-fieldtype>
            </div>

            <div class="flex-1">

                <div v-if="source === 'field'" class="source-field-select">
                    <suggest-fieldtype :data.sync="[value]" :config="suggestConfig" :suggestions-prop="suggestSuggestions"></suggest-fieldtype>
                </div>

                <component
                    v-if="source === 'custom'"
                    :is="componentName"
                    :name="title"
                    :data.sync="[value]"
                    :config="fieldConfig"
                    :leave-alert="true">
                </component>

            </div>

        </div>

    </div>

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

    props: {
        title: String,
        source: String,
        value: [],
        allowedFieldtypes: [],
        sourceField: null,
        customText: null
    },

    data() {
        return {
            // autoBindChangeWatcher: false,
            // changeWatcherWatchDeep: false,
        }
    },

    computed: {

        componentName() {
            console.log(this);
            // console.log(this.source.replace('.', '-') + '-fieldtype');
            return this.config.field.type.replace('.', '-') + '-fieldtype';
            // return this.source.replace('.', '-') + '-fieldtype';
            // console.log(this.source + '-fieldtype');
            // return 'text-fieldtype';
        },

        sourceTypeSelectOptions() {
            // console.log(this.sourcefield !== false);
            let options = [];
            // options.push({ text: 'Custom', value: 'custom' });

            // if (this.source === 'custom') {
                // Adds the custom option as a last item to the fieldtype select
                options.push({ text: 'Custom', value: 'custom' });
            // }

            // if (this.source === 'field') {
                // Adds the 'from field' as a first item to from the fieldtype select
                options.unshift({ text: 'From Field', value: 'field' });
            // }

            // if (this.config.disableable) {
                // Does something with disableable fields
                // options.push({ text: 'Disable', value: 'disable' });
            // }

            // console.log(options);

            return options;
        },

        suggestConfig() {
            return {
                type: 'suggest',
                // mode: 'anchorman',
                max_items: 1,
                create: true,
                placeholder: translate('addons.Anchorman::messages.source_suggest_placeholder')
            }
        },

        suggestSuggestions() {
            return Anchorman.fieldSuggestions.filter(item => this.allowedFieldtypes.includes(item.type));
        },

        fieldConfig() {
            console.log(this);
            return Object.assign(this.config.field, { placeholder: this.config.placeholder });
        }

    },

    watch: {

        source(val) {
            this.source = val;

            if (val === 'field') {
                this.value = Array.isArray(this.sourceField) ? this.sourceField[0] : this.sourceField;
            } else {
                this.value = this.customText;
            }
        },

        sourceField(val) {
            this.value = Array.isArray(val) ? val[0] : val;
        },

        customText(val) {
            this.value = val;
        }

    },

    ready() {

        // let types = this.config.allowed_fieldtypes || ['text', 'textarea', 'markdown', 'redactor'];
        // this.allowedFieldtypes = types.concat(this.config.merge_allowed_fieldtypes || []);

        if (this.source === 'field') {
            this.sourceField = [this.value];
        } else {
            this.customText = this.value;
        }

        this.source = this.source;
        // this.bindChangeWatcher();

    }

}
</script>
