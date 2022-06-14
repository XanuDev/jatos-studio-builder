<template>
    <!-- <nav class="nav nav-pills nav-justified">
        <router-link
            to="/"
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
    </nav> -->
    <nav class="nav nav-pills nav-justified">
        <router-link
            to="/"
            class="nav-item nav-link"
            :class="{ active: active === 'dashboard' }"
            @click="setActive('dashboard')"
            >Dashboard</router-link
        >
        <a
            href="#"
            class="nav-item nav-link"
            :class="{ active: active === 'input' }"
            @click="setActive('input')"
            >Input</a
        >
        <a
            href="#"
            class="nav-item nav-link"
            :class="{ active: active === 'image' }"
            @click="setActive('image')"
            >Image</a
        >
        <a
            href="#"
            class="nav-item nav-link"
            :class="{ active: active === 'video' }"
            @click="setActive('video')"
            >Video</a
        >
        <a
            href="#"
            class="nav-item nav-link"
            :class="{ active: active === 'text' }"
            @click="setActive('text')"
            >Text</a
        >
    </nav>
</template>

<script setup>
import { ref } from 'vue';

const active = ref('');
const setActive = (item) => {
    active.value = item;
};
</script>
