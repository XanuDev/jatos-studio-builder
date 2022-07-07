import { createStore } from 'vuex';

export default createStore({
    state: {
        inputs: null,
        position: 0,
        totalComponents: 0,
        active: 'HomeView',
        json_inputs: '',
    },
    getters: {
        getInputs(state) {
            return state.inputs;
        },
        getInputByID: (state) => (id) => {
            return state.inputs.find((e) => {
                return e.id == id;
            });
        },
        getPosition(state) {
            return state.position;
        },
        getActive(state) {
            return state.active;
        },
        getTotalComponents(state) {
            return state.totalComponents;
        },
    },
    mutations: {
        setInputs(state, inputs) {
            state.inputs = inputs;
        },
        setPosition(state, position) {
            state.position = position;
        },
        setActive(state, active) {
            state.active = active;
        },
        setTotalComponents(state, total) {
            state.totalComponents = total;
        },
    },
    actions: {},
    modules: {},
});
