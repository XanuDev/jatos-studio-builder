import { createStore } from 'vuex';

export default createStore({
    state: {
        inputs: null,
        position: 0,
        totalComponents: 0,
        active: '',
        json_inputs: '',
        isLast: false,
        results: [],
        allResults: [],
        result: null,
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
        getInputByPos: (state) => (pos) => {
            return state.inputs[pos];
        },
        getResults: (state) => {
            return state.results;
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
            state.isLast = state.totalComponents - 1 == position;
        },
        setActive(state, active) {
            state.active = active;
        },
        setTotalComponents(state, total) {
            state.totalComponents = total;
        },
        addResult(state) {
            state.allResults = [state.result, ...state.allResults];
        },
        clearResult(state) {
            state.result = null;
            state.results = [];
        },
    },
    actions: {
        addResultAction(contex) {
            contex.commit('addResult');
        },
        clearResultAction(contex) {
            contex.commit('clearResult');
        },
    },
    modules: {},
});
