<template>
    <div class="container text-center">
        <h1 class="my-4">
            {{ input.title }}
        </h1>
        <p>
            {{ input.contents }}
        </p>
        <ButtonsComponent />
    </div>
</template>

<script setup>
import { useStore } from 'vuex';
import { onBeforeMount, ref } from 'vue';
import ButtonsComponent from './ButtonsComponent.vue';

const store = useStore();

const input = ref(null);
onBeforeMount(() => {
    input.value = store.getters.getInputByID(store.state.position);
});
</script>
