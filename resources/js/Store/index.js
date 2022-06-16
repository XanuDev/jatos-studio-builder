import { createStore } from 'vuex';

const store = createStore({
    state: {
        active: `dashboard`,
        project_id: null,
        project_name: null,
        project_file: null,
    },
    getters: {
        getActive(state) {
            return state.active;
        },
        getProject(state) {
            return {
                id: state.project_id,
                name: state.project_name,
                file: state.project_file,
            };
        },
    },
    mutations: {
        setProject(state, project) {
            state.project_id = project.id;
            state.project_name = project.name;
            state.project_file = project.file;
        },
    },
    actions: {},
    modules: {},
});

export default store;
