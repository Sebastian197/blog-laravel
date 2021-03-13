window.Vue = require('vue').default;
import VueRouter from 'vue-router';

/**
|--------------------------------------------------
| Components Post
|--------------------------------------------------
*/
import PostList from '../components/post/PostListComponent.vue';
import PostDetail from '../components/post/PostDetailComponent.vue';
import PostCategory from '../components/post/PostCategoryComponent.vue';

Vue.use(VueRouter);


/**
|--------------------------------------------------
| Routes Aplication
|--------------------------------------------------
*/
const router = new VueRouter({
    mode: 'history',
    routes: [
        { path: '/', component: PostList, name: 'list' },
        { path: '/detail/:id', component: PostDetail, name: 'detail' },
        { path: '/post-category/:category_id', component: PostCategory, name: 'post-category' },
    ]
});

export default router;
