import { createStore } from 'vuex';

const store = createStore({
    state: {
        kaixo: `Kaixo Mundua!`,
        active: `dashboard`,
        project_id: null,
    },
    getters: {
        getKaixo(state) {
            return state.kaixo;
        },
        getActive(state) {
            return state.active;
        },
        getProject(state) {
            return state.project_id;
        },
    },
    mutations: {
        setProject(state, id) {
            state.project_id = id;
        },
    },
    actions: {},
    modules: {},
});

export default store;
