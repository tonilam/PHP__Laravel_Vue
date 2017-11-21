
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
import UsersEdit from './components/users/UsersEdit.vue';

const routes = [
    {
        path: '/',
        components: {
            usersIndex: UsersIndex
        }
    },
    {
        name: 'createUser',
        path: '/users/create',
        component: UsersCreate
    },
    {
        name: 'editUser',
        path: '/users/edit',
        component: UsersEdit
    }
]

const router = new VueRouter({routes});

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

//Vue.component('example', require('./components/Example.vue'));

const app = new Vue({router}).$mount('#app');
