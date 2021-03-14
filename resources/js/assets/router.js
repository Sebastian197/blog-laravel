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

/**
|--------------------------------------------------
| Components Category
|--------------------------------------------------
*/
import CategoryList from '../components/category/CategoryListComponent.vue';

/**
|--------------------------------------------------
| Components Contact
|--------------------------------------------------
*/
import Contact from '../components/contact/ContactComponent.vue';

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
        { path: '/categories', component: CategoryList, name: 'list-category' },
        { path: '/detail/:id', component: PostDetail, name: 'detail' },
        { path: '/post-category/:category_id', component: PostCategory, name: 'post-category' },
        { path: '/contact', component: Contact, name: 'contact' },
    ]
});

export default router;
