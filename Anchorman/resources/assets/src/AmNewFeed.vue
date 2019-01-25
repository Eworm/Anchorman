<script>

export default {
    props: [],

    data: function() {
        return {
            feedName: ''
        }
    },

    methods: {
        saveFeed: function() {
            if (this.url !== '') {
                this.$http.post(
                    cp_url("addons/anchorman/store"), {
                        url: this.url
                    },
                    function(res) {
                        location.href = cp_url('addons/anchorman/edit/') + res.feed
                    }
                )
            } else {
                this.$dispatch("setFlashError", 'Uh oh! Enter a url for this feed')
            }
        }
    },

    ready: function() {}
}

</script>
