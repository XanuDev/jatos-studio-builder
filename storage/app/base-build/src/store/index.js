import { createStore } from 'vuex';

export default createStore({
    state: {
        inputs: [],
        position: 0,
        active: 'homeView',
        json_inputs: '',
    },
    getters: {
        getInputs(state) {
            return state.inputs;
        },
        getPosition(state) {
            return state.position;
        },
        getActive(state) {
            return state.active;
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
    },
    actions: {},
    modules: {},
});
