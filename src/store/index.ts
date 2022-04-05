import { createStore } from "vuex";

export default createStore({
  state: {
    kaixo: `Kaixo Mundua!`,
  },
  getters: {
    getKaixo(state) {
      return state.kaixo;
    },
  },
  mutations: {},
  actions: {},
  modules: {},
});
