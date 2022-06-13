import Vue from 'vue';
import VueRouter from 'vue-router';

import Home from './pages/Home.vue';
import Level from './pages/Level.vue';

Vue.use(VueRouter);

const router = new VueRouter({
    mode: 'history',
    linkExactActiveClass: 'active',
    routes: [
        // {
        //     path: '/',
        //     name: 'home',
        //     component: Home
        // },
        {
            path: '/',
            name: 'level',
            component: Level
        }
    ]
});

export default router;