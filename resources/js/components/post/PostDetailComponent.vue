<template>
    <div>
        <h1 class="mt-3">{{post.titlePost}}</h1>
        <div v-if="post">
            <div class="card mt-3" >
                <div class="card-header">
                    <img
                        v-bind:src="image"
                        class="card-img-top"
                    />
                </div>
                <div class="card-body">
                    <h1 class="card-title">{{post.titlePost}}</h1>
                    <router-link
                        class="badge badge-pill badge-success p-1 mb-3 mt-3"
                        :to="{name: 'post-category', params: {category_id: categoryId}}"
                    >
                        {{category}}
                    </router-link>
                    <p class="card-text">{{post.content}}</p>
                </div>
            </div>
        </div>
        <div v-else>
            <h1>Post no existe</h1>
        </div>
    </div>
</template>

<script>
export default {
    created() {
        this.getPost(this.$route.params.id)
    },

    methods: {
        getPost: function (p) {
            fetch(`/api/post/${p}`)
                .then(resp =>  resp.json())
                .then(json => {
                    console.log('PostDetailComponent -> ',json.data)
                    const { id: idPost, title: titlePost, content } = json.data
                    const post = { idPost, titlePost, content }
                    const { image } = json.data.image
                    const {title: titleCategory, id: idCategory} = json.data.category

                    this.post = post
                    this.image = image
                    this.category = titleCategory
                    this.categoryId = idCategory
                });
        }
    },

    data: function () {
        return {
            postSelected: '',
            post: '',
            image: '',
            category: '',
            category_id: ''
        };
    }
}
</script>
