<script>

export default {
   props: [],

    data: function() {
        return {}
    },

    methods: {
        refreshAll: function() {
            console.log('Clicked');
            this.$http.get(cp_url('addons/anchorman/refresh_all')).then(response => {
                // this.currentReportId = response.data;
                this.loading = false;
            });
        },

        deleteFeed: function(feed) {
            var self = this;

            swal({
                title: translate('cp.are_you_sure'),
                text: translate_choice('cp.confirm_delete_items', 1),
                type: 'warning',
                confirmButtonText: translate('cp.yes_im_sure'),
                showCancelButton: true,
                closeOnConfirm: false,
            },
            function(canDelete) {
                if (canDelete) {
                    self.$http.delete(
                        cp_url('addons/anchorman/destroy'), {
                            feed: feed
                        },
                        function() {
                            location.reload();
                        }
                    )
                }
            });
        }
    },

    ready: function() {}
}

</script>
