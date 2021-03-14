<template>
    <div class="row">
        <div
            class="col-md-3"
            v-for="category in categories"
            v-bind:key="category.id"
        >
            <div class="card mt-3">
                <router-link
                    :to="{name: 'post-category', params: {category_id: category.id}}"
                >
                    <img
                        src="/images_category/red-mundial.png"
                        class="card-img-top mt-3"
                    />
                    <div class="card-body">
                        <h5 class="card-title text-center">{{category.title}}</h5>
                    </div>
                </router-link>
            </div>
        </div>
    </div>
</template>

<script>
/**
|--------------------------------------------------
| Libraries
|--------------------------------------------------
*/

export default {

    created() {
        this.getCategories()
    },

    methods: {
        getCategories: function () {
            fetch(`/api/category/all`)
                .then(res => res.json())
                .then(json => this.categories = json.data)
        }
    },

    data: function () {
        return {
            categories: ''
        }
    }
}
</script>
