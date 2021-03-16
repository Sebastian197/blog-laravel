<template>
    <div>
        <div
            class="card mt-3"
            v-for="post in posts"
            v-bind:key="post.title"
        >
            <img
                v-bind:src="post.image"
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
        <modal-post
            @closeModalPost="closeModalPost"
            :post="postSelected"
        ></modal-post>
        <v-pagination
            class="mt-3"
            v-model="currentPage"
            :page-count="total"
            :classes="bootstrapPaginationClasses"
            :labels="paginationAnchorTexts"
        ></v-pagination>
    </div>
</template>

<script>
/**
|--------------------------------------------------
| Libraries
|--------------------------------------------------
*/
import vPagination from 'vue-plain-pagination';

export default {
    props: ['posts', 'total', 'pCurrentPage'],

    created() {
        this.currentPage = this.pCurrentPage
    },

    methods: {
        postClick: function (p) {
            this.postSelected = p
        },

        closeModalPost: function() {
            this.postSelected = '';
        },
    },

    data: function () {
        return {
            postSelected: '',
            currentPage: 1,
            bootstrapPaginationClasses: {
                ul: 'pagination',
                li: 'page-item',
                liActive: 'active',
                liDisable: 'disabled',
                button: 'page-link'
            },
            paginationAnchorTexts: {
                first: 'First',
                prev: '&laquo;',
                next: '&raquo;',
                last: 'Last'
            }
        }
    },

    components: { vPagination },

    watch: {
        currentPage: function (newVal, oldVald) {
            this.$emit('getCurrentPage', newVal)
        }
    }
}
</script>
