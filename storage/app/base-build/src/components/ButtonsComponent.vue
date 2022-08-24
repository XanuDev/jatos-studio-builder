<template>
    <div>
        <button class="btn btn-primary mt-2 mx-1" @click="nextInput">
            Previus
        </button>

        <button class="btn btn-danger mt-2 mx-1" @click="onCancelButtonClick">
            Cancel
        </button>

        <button
            class="btn btn-primary mt-2 mx-1"
            @click="nextInput(props.resultDataObject, props.resultFile)"
        >
            <span v-if="$store.state.isLast"> Finish </span>
            <span v-else> Next </span>
        </button>
    </div>
</template>
<script setup>
import { useStore } from 'vuex';
import { defineProps } from 'vue';
import { isProxy } from 'vue';

const props = defineProps({
    resultDataObject: Object,
    resultFile: String,
});

const store = useStore();

const nextInput = (resultDataObject, file) => {
    if (resultDataObject) {
        if (isProxy(resultDataObject)) {
            resultDataObject = JSON.parse(JSON.stringify(resultDataObject));
        }
        console.log(resultDataObject);
        if (file) {
            // eslint-disable-next-line
            jatos.uploadResultFile(resultDataObject, file).done(() => {});
        } else {
            // eslint-disable-next-line
            jatos.submitResultData(resultDataObject);
        }
    }

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
