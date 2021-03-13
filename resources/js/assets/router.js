window.Vue = require('vue').default;
import VueRouter from 'vue-router';

/**
|--------------------------------------------------
| Components Post
|--------------------------------------------------
*/
import PostList from '../components/post/PostListComponent.vue';

const Foo = { template: '<div>foo<router-link to="/foo">Go to Foo</router-link><router-link to="/bar">Go to Bar</router-link><router-link to="/">Go to List</router-link></div>' }
const Bar = { template: '<div>bar<router-link to="/foo">Go to Foo</router-link><router-link to="/bar">Go to Bar</router-link><router-link to="/">Go to List</router-link></div>' }

Vue.use(VueRouter);

const router = new VueRouter({
    routes: [
        { path: '/', component: PostList },
        { path: '/foo', component: Foo },
        { path: '/bar', component: Bar },
    ]
});

export default router;
