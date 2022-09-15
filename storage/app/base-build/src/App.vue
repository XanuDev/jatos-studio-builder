<template>
    <div class="main">
        <main class="content container">
            <AudioView v-if="$store.state.active == 'audio'" />
            <InputView v-if="$store.state.active == 'input'" />
            <OutputView v-if="$store.state.active == 'output'" />
        </main>
    </div>
</template>

<script setup>
import { onBeforeMount } from 'vue';
import { useStore } from 'vuex';
import AudioView from './views/AudioView.vue';
import InputView from './views/InputView.vue';
import OutputView from './views/OutputView.vue';

const inputs = require('../../json/' + process.env.VUE_APP_JSON_FILE + '.json');

const store = useStore();

onBeforeMount(() => {
    inputs.forEach((e) => {
        console.log(e.title, document.title);
    });

    let component_inputs = inputs.find((e) => {
        return e.title == document.title;
    });

    store.commit('setInputs', component_inputs.inputs);
    store.state.active = component_inputs.inputs[0].type;
    store.commit('setTotalComponents', component_inputs.inputs.length);
});
</script>
