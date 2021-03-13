<template>
    <div>
        <h1 class="mt-3">{{category}}</h1>
        <post-list-default :posts='posts'></post-list-default>
    </div>
</template>

<script>
export default {
    created() {
        this.getPosts(this.$route.params.category_id)
    },

    methods: {
        postClick: function (p) {
            this.postSelected = p
        },

        closeModalPost: function() {
            this.postSelected = '';
        },

        getPosts: function(category_id) {
            fetch(`/api/post/${category_id}/category`)
                .then(resp =>  resp.json())
                .then(json => {
                    const { data } = json.data.posts
                    const { title } = json.data.category
                    this.posts = data
                    this.category = title
                })
        }
    },

    data: function () {
        return {
            postSelected: '',
            posts: [],
            category: '',
        }
    }
}
</script>
