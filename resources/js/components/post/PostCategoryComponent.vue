<template>
    <div>
        <h1 class="mt-3">{{category}}</h1>
        <div
            class="card mt-3"
            v-for="post in posts"
            v-bind:key="post.title"
        >
            <img
                v-bind:src=" '/images/' + post.image"
                class="card-img-top"
            />
            <div class="card-body">
                <h5 class="card-title">{{post.title}}</h5>
                <p class="card-text">{{post.content}}</p>
                <button
                    class="btn btn-outline-info btn-sm mr-2"
                    v-on:click="postClick(post)"
                >
                    Ver resumen
                </button>
                <router-link
                    class="btn btn-outline-success btn-sm"
                    :to="{name: 'detail', params: {id: post.id}}"
                >
                    Ver post
                </router-link>
            </div>
        </div>
        <modal-post @closeModalPost="closeModalPost" :post="postSelected"></modal-post>
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
