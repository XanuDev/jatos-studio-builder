<template>
    <ul class="sidebar-nav">
        <li class="sidebar-header">Pages</li>

        <li class="sidebar-item" :class="{ active: active === 'home' }">
            <div class="sidebar-link">
                <router-link to="/">
                    <i class="align-middle" data-feather="home"></i>
                    <span class="align-middle" @click="setActive('home')"
                        >Home</span
                    >
                </router-link>
            </div>
        </li>
        <li class="sidebar-item" :class="{ active: active === 'dashboard' }">
            <div class="sidebar-link">
                <router-link to="/dashboard">
                    <i class="align-middle" data-feather="sliders"></i>
                    <span class="align-middle" @click="setActive('dashboard')"
                        >Dashboard</span
                    >
                </router-link>
            </div>
        </li>

        <li class="sidebar-header">Tools & Components</li>

        <li class="sidebar-item" :class="{ active: active === 'builder' }">
            <div class="sidebar-link">
                <router-link to="/builder">
                    <i class="align-middle" data-feather="sliders"></i>
                    <span class="align-middle" @click="setActive('builder')"
                        >Form Builder</span
                    >
                </router-link>
            </div>
        </li>

        <li class="sidebar-item" :class="{ active: active === 'about' }">
            <div class="sidebar-link">
                <router-link to="/about">
                    <i class="align-middle" data-feather="help-circle"></i>
                    <span class="align-middle" @click="setActive('about')"
                        >About</span
                    >
                </router-link>
            </div>
        </li>
    </ul>
</template>

<script>
import { onMounted } from "vue";
export default {
    name: "SideBar",
    setup: () => {
        let active = "home";
        const setActive = (item) => {
            active = item;
        };

        onMounted(() => console.log("mounted!"));

        return {
            active,
            setActive,
        };
    },
};
</script>

<style>
nav li a {
    color: aliceblue;
    text-decoration: none;
}
</style>
