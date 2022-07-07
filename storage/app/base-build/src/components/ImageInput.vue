<template>
    <div class="container text-center">
        <h1 class="my-4">
            {{ input.title }}
        </h1>
        <img :src="input.contents" alt="" />
        <button class="btn btn-primary" @click="emit('nextInput')">Next</button>
    </div>
</template>

<script setup>
import { useStore } from 'vuex';
import { onBeforeMount, defineEmits, ref } from 'vue';

const emit = defineEmits(['nextInput']);
const store = useStore();

const input = ref(null);
onBeforeMount(() => {
    input.value = store.getters.getInputByID(store.state.position);
});
</script>
