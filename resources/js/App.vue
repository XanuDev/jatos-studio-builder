<template>
    <Navbar />
    <main class="content">
        <div class="container-fluid p-0">
            <router-view />
        </div>
    </main>
</template>

<script>
import Navbar from "./Components/layout/Navbar.vue";
export default {
    name: "app",
    components: {
        Navbar,
    },
};
</script>
