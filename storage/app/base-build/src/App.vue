<template>
    <div class="main">
        <main class="content">
            <div class="container-fluid p-0">
                <router-view />
            </div>
        </main>
    </div>
</template>

<script setup>
import { onMounted } from 'vue';
import router from './router/index.js';
onMounted(() => {
    router.push('/');
});
</script>
