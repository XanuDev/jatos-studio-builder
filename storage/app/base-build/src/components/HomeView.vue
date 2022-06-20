<template>
    <div class="container text-center">
        <h1 class="my-4">{{ inputsData[$store.state.position].text }}</h1>
        <button
            class="btn btn-primary"
            @click="nextInput(inputsData[$store.state.position + 1].component)"
        >
            Start
        </button>
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

const nextInput = (input) => {
    store.commit('setActive', input);
};
</script>
