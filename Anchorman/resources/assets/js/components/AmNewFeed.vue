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
            console.log('test');
            if (this.feedName !== '') {
                this.$http.post(
                    cp_url("addons/anchorman/store"), {
                        feed_name: this.feedName
                    },
                    function(res) {
                        console.log(res);
                        // location.href = cp_url('addons/anchorman/edit/') + res.feed
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
