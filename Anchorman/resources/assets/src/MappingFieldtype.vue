<template>

    <div class="mb-3" v-for="(index, item) in structure">

        <label class="block">
            {{ item | capitalize }}
        </label>

        <div class="flex">

            <div class="source-type-select pr-2">
                <select-fieldtype :data.sync="source" :options="sourceTypeSelectOptions"></select-fieldtype>
            </div>

            <div class="flex-1">

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
            source: null,
            customText: null,
            sourceField: null,
            autoBindChangeWatcher: false,
            changeWatcherWatchDeep: false,
            structure: [],
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
                options.unshift({ text: 'To Field', value: 'field' });
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
            return Anchorman.fieldSuggestions.filter(item => this.allowedFieldtypes.includes(item.type));
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
        // console.log(this);

        this.$http.get(
            cp_url("addons/anchorman/get_item_structure"), {
                url: Statamic.Publish.contentData.permalink
            },
            function(res) {
                this.structure = res;
                console.log(this.structure);
            }
        )
        console.log(this);

        // this.bindChangeWatcher();
    }

}
</script>
