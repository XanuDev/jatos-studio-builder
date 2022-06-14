<template>
    <div class="main">
        <main class="content">
            <NavBar />
            <div class="container-fluid p-0">
                <router-view />
            </div>
        </main>
    </div>
</template>

<script setup>
//import NavBar from '../../../../resources/js/Components/NavBar.vue';
import NavBar from './components/NavBar.vue';
</script>
