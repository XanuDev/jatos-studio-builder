require("./bootstrap");

import { createApp } from "vue";

import router from "./Router/index";
import store from "./Store/index";
import App from "./App";

const app = createApp({});
app.use(router);
app.use(store);
app.component("App", App);
app.mount("#app");
