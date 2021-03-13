<template>
    <div>
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
        this.getPost()
    },

    methods: {
        postClick: function (p) {
            this.postSelected = p
        },

        closeModalPost: function() {
            this.postSelected = '';
        },

        getPost: function() {
            fetch('/api/post')
                .then(resp =>  resp.json())
                .then(json => {
                    const { data } = json.data
                    this.posts = data
                })
        }
    },

    data: function () {
        return {
            postSelected: '',
            posts: []
        }
    }
}
</script>
