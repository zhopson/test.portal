/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

import Vue from 'vue';
import VueRouter from 'vue-router';

import Home from './pages/Home.vue';
import About from './pages/About.vue';
import TestPage from './pages/TestPage.vue';

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
            path: '/testpage',
            name: 'testpage',
            component: TestPage
        },
        {
            path: '/about',
            name: 'about',
            component: About
        },
    ]
});

export default router;

