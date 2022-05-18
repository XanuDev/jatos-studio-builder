import { createStore } from "vuex";

export default createStore({
  state: {
    inputs: [],
  },
  getters: {
    getInputs(state) {
      return state.inputs;
    },
  },
  mutations: {
    setInputs(state, inputs) {
      state.inputs = inputs;
    },
  },
  actions: {},
  modules: {},
});
