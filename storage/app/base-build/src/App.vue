<template>
    <div class="main">
        <main class="content container">
            <HomeView
                v-if="$store.state.active == 'HomeView'"
                @nextInput="nextInput"
            />
            <TextInput
                v-if="$store.state.active == 'TextInput'"
                @nextInput="nextInput"
            />
            <ImageInput
                v-if="$store.state.active == 'ImageInput'"
                @nextInput="nextInput"
            />
            <AudioRecording
                v-if="$store.state.active == 'AudioRecording'"
                @nextInput="nextInput"
            />
            <SubmitResult
                v-if="$store.state.active == 'SubmitResult'"
                @nextInput="nextInput"
            />
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

const nextInput = () => {
    let newPos = store.state.position + 1;
    if (newPos > store.state.totalComponents - 1) {
        return;
    }
    store.commit('setPosition', newPos);
    let next = store.getters.getInputByID(newPos);
    store.commit('setActive', next.component);
};
</script>
