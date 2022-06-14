<template>
    <div class="container text-center">
        <h1 class="my-4">Jatos Audio Recorder</h1>
        <router-link class="btn btn-primary" :to="'/' + inputs[0].component"
            >Next</router-link
        >
    </div>
</template>

<script setup>
import inputsData from '../assets/inputs.json';
import { onMounted, ref } from 'vue';
import { useStore } from 'vuex';
const store = useStore();

const inputs = ref(inputsData);

onMounted(() => {
    store.commit('setInputs', inputs);
});
</script>
