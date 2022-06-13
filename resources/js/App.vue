<template>
    <NavBar />
    <main class="content">
        <div class="container-fluid p-0">
            <router-view />
        </div>
    </main>
</template>

<script setup>
import NavBar from './Components/NavBar.vue';
import { onMounted } from 'vue';
import { useStore } from 'vuex';
const store = useStore();

// eslint-disable-next-line
const props = defineProps(['project_id']);

onMounted(() => {
    store.commit('setProject', props.project_id);
});
</script>
