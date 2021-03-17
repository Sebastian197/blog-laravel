<template>
    <div>
        <h1 class="mt-3">{{category}}</h1>
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
            fetch(`/api/post/${this.$route.params.category_id}/category?page=${this.currentPage}`)
                .then(resp =>  resp.json())
                .then(json => {
                    const { data, last_page } = json.data.posts
                    const { title } = json.data.category
                    
                    this.posts = data
                    this.total = last_page
                    this.category = title
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
            category: '',
            total: 0,
            currentPage: 1
        }
    }
}
</script>
