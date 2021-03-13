<template>
    <div>
        <post-list-default
            @getCurrenPage="getCurrenPage"
            v-if="total > 0"
            :posts='posts'
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
            fetch(`/api/post?page=${this.getCurrenPage}`)
                .then(resp =>  resp.json())
                .then(json => {
                    const { data, last_page } = json.data
                    console.log(json.data)
                    this.posts = data
                    this.total = last_page
                    console.log('modal created ', last_page)
                })
        },

        getCurrenPage: function (val) {
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
