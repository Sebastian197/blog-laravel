<template>
    <div class="col-8 offset-2">
        <h1 class="mt-3">Contacto</h1>
        <div class="card">
            <div class="card-header">
                <img
                    class="rounded mx-auto d-block"
                    src="/images/1615217482.jpg"
                />
            </div>
            <div class="card-body">
                <div class="input-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text">Nombre</span>
                    </div>
                    <input
                        type="text"
                        aria-label="name"
                        class="form-control"
                        v-model="name"
                    />
                </div>
                <div class="input-group mt-3">
                    <div class="input-group-prepend">
                        <span class="input-group-text">Apellido</span>
                    </div>
                    <input
                        type="text"
                        aria-label="surname"
                        class="form-control"
                        v-model="surname"
                    />
                </div>
                <div class="input-group mt-3">
                    <div class="input-group-prepend">
                        <span class="input-group-text">Email</span>
                    </div>
                    <input
                        type="email"
                        aria-label="email"
                        class="form-control"
                        v-model="email"
                    />
                </div>
                <div class="input-group mt-3">
                    <textarea
                        class="form-control"
                        aria-label="comment"
                        placeholder="Comentarios"
                        rows="3"
                        v-model="comment"
                    ></textarea>
                </div>
                <button
                    @click="saveContact"
                    class="btn btn-primary float-right mt-3"
                >
                    Enviar
                </button>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    created() {

    },

    methods: {
        saveContact: function() {
            return
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
    },

    data: function () {
        return {
            name: '',
            surname: '',
            email: '',
            comment: ''
        }
    }
}
</script>
