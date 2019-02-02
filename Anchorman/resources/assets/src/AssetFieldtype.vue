<template>

    <div class="anchorman-asset-fieldtype">
        <div v-if="!container" class="no-container text-sm">
            <i class="icon icon-warning"></i>
            {{ translate('cp.no_asset_container_specified')}}
            <a :href="cp_url('addons/anchorman/settings')" class="ml-1">{{ translate('cp.edit') }}</a>
        </div>

        <assets-fieldtype v-if="container" :data.sync="data" :config="fieldConfig"></assets-fieldtype>
    </div>

</template>


<style>

    .anchorman-asset-fieldtype .assets-fieldtype .manage-assets {
        border: none;
        background: none;
        padding: 0;
    }

    .anchorman-asset-fieldtype .assets-fieldtype .drag-notification + .manage-assets {
        opacity: 0;
    }

    .anchorman-asset-fieldtype .no-container {
        padding: 5px;
    }

</style>


<script>
export default {

    mixins: [Fieldtype],

    computed: {

        container() {
            const container = Anchorman.assetContainer;
            if (container == '') return false;
            return container;
        },

        fieldConfig() {
            return Object.assign(this.config, {
                container: this.container,
                folder: '/',
                max_files: 1
            });
        }

    }

}
</script>
