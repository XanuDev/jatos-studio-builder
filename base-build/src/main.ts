//import "bootstrap/dist/css/bootstrap.min.css";
import "./styles/app.scss";
import { createApp } from "vue";
import App from "./App.vue";
import router from "./router";
import store from "./store";
import "./modules.js";

createApp(App).use(store).use(router).mount("#app");
