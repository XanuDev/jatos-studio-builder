<template>
    <div class="main">
        <main class="content container">
            <HomeView v-if="$store.state.active == 'HomeView'" />
            <TextInput v-if="$store.state.active == 'TextInput'" />
            <ImageInput v-if="$store.state.active == 'ImageInput'" />
            <AudioRecording v-if="$store.state.active == 'AudioRecording'" />
            <SubmitResult v-if="$store.state.active == 'SubmitResult'" />
        </main>
    </div>
</template>

<script setup>
import { onBeforeMount } from 'vue';
import { useStore } from 'vuex';
import HomeView from './components/HomeView.vue';
import TextInput from './components/TextInput.vue';
import ImageInput from './components/ImageInput.vue';
import AudioRecording from './components/AudioRecording.vue';
import SubmitResult from './components/SubmitResult.vue';

const inputs = require('../../json/' + process.env.VUE_APP_JSON_FILE + '.json');

const store = useStore();

onBeforeMount(() => {
    let component_inputs = inputs.find((e) => {
        return e.title == document.title;
    });

    store.commit('setInputs', component_inputs.inputs);
    store.commit('setTotalComponents', component_inputs.inputs.length);
});
</script>
