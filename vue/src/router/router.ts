import { createRouter, createWebHistory, RouteRecordRaw } from 'vue-router'

import LakesPage from '../views/LakesPage.vue'
import LakesMeteringsPage from '../views/LakesMeteringsPage.vue'
import AboutPage from '../views/AboutPage.vue'

const routes: Array<RouteRecordRaw> = [
    {
        path: '/',
        name: 'lakes',
        component: LakesPage
    },
    {
        path: '/lakes-meterings',
        name: 'lakesMeterings',
        component: LakesMeteringsPage
    },
    {
        path: '/about',
        name: 'about',
        component: AboutPage
    }
]

const router = createRouter({
    history: createWebHistory(process.env.BASE_URL),
    routes
})

export default router
