import DashboardView from '../Pages/DashboardView.vue';
import BuilderView from '../Pages/BuilderView.vue';

const routes = [
    {
        path: '/',
        name: 'dashboard',
        component: DashboardView,
    },
    {
        path: '/builder',
        name: 'builder',
        component: BuilderView,
    },
];

export default routes;
