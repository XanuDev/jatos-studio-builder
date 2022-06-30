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
import { useStore } from 'vuex';
import HomeView from './components/HomeView.vue';
import TextInput from './components/TextInput.vue';
import AudioRecording from './components/AudioRecording.vue';
import SubmitResult from './components/SubmitResult.vue';

const inputs = require('../../json/' + process.env.VUE_APP_JSON_FILE + '.json');

const store = useStore();

onMounted(() => {
    let component_inputs = inputs.find((e) => {
        return e.title == document.title;
    });

    store.commit('setInputs', component_inputs.inputs);
    console.log(component_inputs.inputs);
});
</script>
