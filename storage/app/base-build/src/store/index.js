import { createStore } from 'vuex';

export default createStore({
    state: {
        inputs: [],
        position: 0,
    },
    getters: {
        getInputs(state) {
            return state.inputs;
        },
        getPosition(state) {
            return state.position;
        },
    },
    mutations: {
        setInputs(state, inputs) {
            state.inputs = inputs;
        },
        setPosition(state, position) {
            state.position = position;
        },
    },
    actions: {},
    modules: {},
});
