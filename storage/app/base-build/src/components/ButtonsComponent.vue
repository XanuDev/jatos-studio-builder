<template>
    <div>
        <button class="btn btn-primary mt-2 mx-1" @click="nextInput">
            Previus
        </button>

        <button class="btn btn-danger mt-2 mx-1" @click="onCancelButtonClick">
            Cancel
        </button>

        <button class="btn btn-primary mt-2 mx-1" @click="nextInput">
            <span v-if="$store.state.isLast"> Finish </span>
            <span v-else> Next </span>
        </button>
    </div>
</template>
<script setup>
import { useStore } from 'vuex';

const store = useStore();

const nextInput = () => {
    let newPos = store.state.position + 1;
    if (newPos > store.state.totalComponents - 1) {
        // eslint-disable-next-line
        jatos.endStudy();
        return;
    }
    store.commit('setPosition', newPos);
    let next = store.getters.getInputByID(newPos);
    store.commit('setActive', next.component);
};
const onCancelButtonClick = () => {
    // eslint-disable-next-line
    jatos.abortStudy('Worker pressed Cancel button');
};
</script>
