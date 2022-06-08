import HomeView from '../Pages/HomeView.vue';
import DashboardView from '../Pages/DashboardView.vue';
import BuilderView from '../Pages/BuilderView.vue';

const routes = [
    {
        path: '/',
        name: 'home',
        component: HomeView,
    },
    {
        path: '/dashboard',
        name: 'dashboard',
        component: DashboardView,
    },
    {
        path: '/builder',
        name: 'builder',
        component: BuilderView,
    },
    {
        path: '/about',
        name: 'about',
        // route level code-splitting
        // this generates a separate chunk (about.[hash].js) for this route
        // which is lazy-loaded when the route is visited.
        component: () =>
            import(/* webpackChunkName: "about" */ '../Pages/AboutView.vue'),
    },
];

export default routes;
