import { createStore } from "vuex";

const store = createStore({
    state: {
        kaixo: `Kaixo Mundua!`,
        active: `dashboard`,
    },
    getters: {
        getKaixo(state) {
            return state.kaixo;
        },
        getActive(state) {
            return state.active;
        },
    },
    mutations: {},
    actions: {},
    modules: {},
});

export default store;
