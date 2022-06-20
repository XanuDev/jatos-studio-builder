<template>
    <div class="main">
        <main class="content container">
            <HomeView v-if="$store.state.active == 'homeView'" />
            <TextInput v-if="$store.state.active == 'textInput'" />
            <AudioRecording v-if="$store.state.active == 'audioRecording'" />
            <SubmitResult v-if="$store.state.active == 'submitResult'" />
        </main>
    </div>
</template>

<script setup>
import { onMounted } from 'vue';
import HomeView from './components/HomeView.vue';
import TextInput from './components/TextInput.vue';
import AudioRecording from './components/AudioRecording.vue';
import SubmitResult from './components/SubmitResult.vue';

onMounted(() => {});
</script>
