<template>
    <div>
        <post-list-default
            :key='currentPage'
            @getCurrentPage='getCurrentPage'
            v-if='total > 0'
            :posts='posts'
            :pCurrentPage='currentPage'
            :total='total'
        ></post-list-default>
    </div>
</template>

<script>
export default {
    created() {
        this.getPosts()
    },

    methods: {
        postClick: function (p) {
            this.postSelected = p
        },

        closeModalPost: function() {
            this.postSelected = '';
        },

        getPosts: function() {
            fetch(`/api/post?page=${this.currentPage}`)
                .then(resp =>  resp.json())
                .then(json => {
                    const { data, last_page } = json.data

                    this.posts = data
                    this.total = last_page
                })
        },

        getCurrentPage: function (val) {
            this.currentPage = val
            this.getPosts()
        }
    },

    data: function () {
        return {
            postSelected: '',
            posts: [],
            total: 0,
            currentPage: 1
        }
    }
}
</script>
