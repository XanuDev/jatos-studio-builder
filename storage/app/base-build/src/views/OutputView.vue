<template>
    <div class="container text-center">
        <h1 class="my-4">
            {{ input.title }}
        </h1>
        <div v-html="input.contents"></div>
        <ButtonsComponent />
    </div>
</template>

<script setup>
import { useStore } from 'vuex';
import { onBeforeMount, ref } from 'vue';
import ButtonsComponent from '../components/ButtonsComponent.vue';

const store = useStore();

const input = ref(null);
onBeforeMount(() => {
    input.value = store.getters.getInputByPos(store.state.position);
});
</script>
