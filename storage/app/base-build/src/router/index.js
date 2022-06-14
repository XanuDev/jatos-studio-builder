import { createRouter, createWebHistory } from 'vue-router';
import HomeView from '../components/HomeView.vue';
import TextInput from '../components/TextInput.vue';

const routes = [
    {
        path: '/',
        name: 'home',
        component: HomeView,
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
