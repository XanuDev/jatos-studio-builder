import { createRouter, createWebHistory, RouteRecordRaw } from 'vue-router';
import HomeView from '../components/HomeView.vue';
import TextFormInput from '../components/TextFormInput.vue';
import TextInput from '../components/TextInput.vue';

const routes: Array<RouteRecordRaw> = [
    {
        path: '/',
        name: 'home',
        component: HomeView,
    },
    {
        path: '/textforminput',
        name: 'TextFormInput',
        component: TextFormInput,
    },
    {
        path: '/textinput',
        name: 'TextInput',
        component: TextInput,
    },
];

const router = createRouter({
    history: createWebHistory(process.env.BASE_URL),
    routes,
});

export default router;
