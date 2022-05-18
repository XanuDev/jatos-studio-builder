<template>
    <nav id="sidebar" class="sidebar js-sidebar">
        <div class="sidebar-content js-simplebar">
            <a class="sidebar-brand" href="index.html">
                <span class="align-middle">Jatos Builder</span>
            </a>
            <Sidebar />
        </div>
    </nav>

    <div class="main">
        <Navbar />

        <main class="content">
            <div class="container-fluid p-0">
                <router-view />
            </div>
        </main>

        <Footerbar />
    </div>
</template>

<script>
import Sidebar from "./Components/layout/Sidebar.vue";
import Footerbar from "./Components/layout/Footerbar.vue";
import Navbar from "./Components/layout/Navbar.vue";
export default {
    name: "app",
    components: {
        Sidebar,
        Navbar,
        Footerbar,
    },
};
</script>
