//import "bootstrap/dist/css/bootstrap.min.css";
import './styles/app.scss';
import { createApp } from 'vue';
import App from './App.vue';
import store from './store';

createApp(App).use(store).mount('#app');
