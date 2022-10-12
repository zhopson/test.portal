/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

import Vue from 'vue';
import VueRouter from 'vue-router';

import Home from './pages/Home.vue';
import About from './pages/About.vue';
import Announces from './pages/Announces.vue';
import Filters from './pages/Filters.vue';

Vue.use(VueRouter);

const router = new VueRouter({
    mode: 'history',
    linkExactActiveClass: 'active',
    routes: [
        {
            path: '/',
            name: 'home',
            component: Home
        },
        {
            path: '/announces/:cat_id?',
            name: 'announces',
            component: Announces
        },
        {
            path: '/filters',
            name: 'filters',
            component: Filters
        },
        {
            path: '/about',
            name: 'about',
            component: About
        },
    ]
});

export default router;

