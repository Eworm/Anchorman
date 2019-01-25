<template>

    <div class="flex">

        <div class="source-type-select pr-2">
            <select-fieldtype :data.sync="source" :options="sourceTypeSelectOptions"></select-fieldtype>
        </div>

        <div class="flex-1">
            <div v-if="source === 'inherit'" class="text-sm text-grey inherit-placeholder">
                {{ config.placeholder }}
            </div>

            <div v-if="source === 'field'" class="source-field-select">
                <suggest-fieldtype :data.sync="sourceField" :config="suggestConfig" :suggestions-prop="suggestSuggestions"></suggest-fieldtype>
            </div>

            <component
                v-if="source === 'custom'"
                :is="componentName"
                :name="name"
                :data.sync="customText"
                :config="fieldConfig"
                :leave-alert="true">
            </component>
        </div>
    </div>

</template>


<style>

    .source-type-select {
        width: 20rem;
    }

    .inherit-placeholder {
        padding-top: 5px;
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
            permalink: null,
            source: null,
            customText: null,
            sourceField: null,
            autoBindChangeWatcher: false,
            changeWatcherWatchDeep: false,
            allowedFieldtypes: []
        }
    },

    computed: {

        componentName() {
            return this.config.field.type.replace('.', '-') + '-fieldtype';
        },

        sourceTypeSelectOptions() {
            let options = [];

            if (this.config.field !== false) {
                options.push({ text: 'Custom', value: 'custom' });
            }

            if (this.config.from_field !== false) {
                options.unshift({ text: 'From Field', value: 'field' });
            }

            if (this.config.inherit !== false) {
                options.unshift({ text: 'Inherit', value: 'inherit' });
            }

            if (this.config.disableable) {
                options.push({ text: 'Disable', value: 'disable' });
            }

            return options;
        },

        suggestConfig() {
            return {
                type: 'suggest',
                mode: 'anchorman',
                max_items: 1,
                create: true,
                placeholder: translate('addons.Anchorman::messages.source_suggest_placeholder')
            }
        },

        suggestSuggestions() {
            return SeoPro.fieldSuggestions.filter(item => this.allowedFieldtypes.includes(item.type));
        },

        fieldConfig() {
            return Object.assign(this.config.field, { placeholder: this.config.placeholder });
        }

    },

    watch: {



    },

    ready() {

        console.log(Statamic.Publish.contentData.permalink);
        this.permalink = Statamic.Publish.contentData.permalink;
        console.log(this);

        this.$http.get(
            cp_url("addons/anchorman/get_item_structure"), {
                url: Statamic.Publish.contentData.permalink
            },
            function(res) {
                console.log(res);
            }
        )

        // this.bindChangeWatcher();
    }

}
</script>
