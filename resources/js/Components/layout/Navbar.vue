<template>
    <nav class="nav nav-pills nav-justified">
        <router-link
            to="/"
            class="nav-item nav-link"
            :class="{ active: active === 'home' }"
            @click="setActive('home')"
            >Home</router-link
        >
        <router-link
            to="/dashboard"
            class="nav-item nav-link"
            :class="{ active: active === 'dashboard' }"
            @click="setActive('dashboard')"
            >Dashboard</router-link
        >
        <router-link
            to="/builder"
            class="nav-item nav-link"
            :class="{ active: active === 'other' }"
            @click="setActive('other')"
            >Active</router-link
        >
    </nav>
</template>

<script>
import { onMounted } from 'vue';

export default {
    name: 'NavBar',
    setup: () => {
        let active = 'home';
        const setActive = (item) => {
            active = item;
        };

        onMounted(() => console.log('mounted!'));

        return {
            active,
            setActive,
        };
    },
};
</script>
