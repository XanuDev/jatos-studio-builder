<template>
  <div class="container text-center">
    <h1 class="my-4">Jatos Audio Recorder</h1>
    <router-link class="btn btn-primary" :to="'/' + inputs[0].component"
      >Next</router-link
    >
  </div>
</template>

<script lang="ts">
import inputsData from "../assets/inputs.json";
import { useStore } from "vuex";
import { Vue } from "vue-class-component";

export default class HomeView extends Vue {
  store = useStore();
  // eslint-disable-next-line
  inputs: any = inputsData;  
  mounted() {
    this.store.commit("setInputs", this.inputs);
  }
}
</script>
