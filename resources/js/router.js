import Vue from 'vue';
import VueRouter from 'vue-router';

import Level from './pages/Level.vue';
import ShinyMemory from './pages/ShinyMemory';
import MultiCalculation from './pages/MultiCalculation';

Vue.use(VueRouter);

const router = new VueRouter({
    mode: 'history',
    linkExactActiveClass: 'active',
    routes: [
        {
            path: '/old',
            name: 'old',
            component: Level
        },
        {
            path: '/multiple-operator',
            name: 'multipleOperator',
            component: MultiCalculation
        },
        {
            path: '/',
            name: 'level',
            component: ShinyMemory
        }
    ]
});

export default router;