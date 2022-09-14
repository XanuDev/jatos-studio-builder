<template>
    <div class="main">
        <main class="content container">
            <AudioView v-if="$store.state.active == 'AudioView'" />
            <InputView v-if="$store.state.active == 'InputView'" />
            <OutputView v-if="$store.state.active == 'OutputView'" />
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
    let component_inputs = inputs.find((e) => {
        return e.title == 'Component 1'; //document.title;
    });

    store.commit('setInputs', component_inputs.inputs);
    store.commit('setTotalComponents', component_inputs.inputs.length);
});
</script>
