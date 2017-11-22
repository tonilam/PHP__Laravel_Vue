
/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

window.Vue = require('vue');
import VueRouter from 'vue-router';

window.Vue.use(VueRouter);

import UsersIndex from './components/users/UsersIndex.vue';
import UsersCreate from './components/users/UsersCreate.vue';
import UserRegister from './components/users/UserRegister.vue';
import UsersEdit from './components/users/UsersEdit.vue';
import BlogsIndex from './components/blogs/BlogsIndex.vue';
import BlogCreate from './components/blogs/BlogCreate.vue';
import BlogContent from './components/blogs/BlogContent.vue';

const routes = [
    {
        path: '/',
        components: {
            blogsIndex: BlogsIndex
        }
    },
    {
        name: 'userRegister',
        path: '/register',
        component: UserRegister
    },
    {
        name: 'blogsIndex',
        path: '/blog',
        component: BlogsIndex
    },
    {
        name: 'usersIndex',
        path: '/users',
        component: UsersIndex
    },
    {
        name: 'createUser',
        path: '/users/create',
        component: UsersCreate
    },
    {
        name: 'editUser',
        path: '/users/edit/:id',
        component: UsersEdit
    },
    {
        name: 'createBlog',
        path: '/blog/:id/create',
        component: BlogCreate
    },
    {
        name: 'viewBlog',
        path: '/blog/:slug',
        component: BlogContent
    }
]

const router = new VueRouter({
    mode: 'history',
    routes: routes
});

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

//Vue.component('example', require('./components/Example.vue'));

const app = new Vue({router}).$mount('#app');
