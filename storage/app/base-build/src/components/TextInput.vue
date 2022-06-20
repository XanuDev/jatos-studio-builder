<template>
    <div class="container text-center">
        <div>
            Test
            <h3>{{ $store.state.inputs[$store.state.position].text }}</h3>
        </div>
        <div>
            <label for="text">Froga</label>
            <input type="text" id="text" v-model="froga" />
        </div>
        <div>
            <button
                type="submit"
                class="btn btn-primary"
                @click="onNextButtonClick"
            >
                Next
            </button>
            <button class="btn btn-danger" @click="onCancelButtonClick">
                Cancel
            </button>
        </div>
    </div>
</template>
<script setup>
import { ref } from 'vue';

const froga = ref('');

const onNextButtonClick = () => {
    var resultData = {
        name: froga.value,
    };
    // eslint-disable-next-line
    jatos.addJatosIds(resultData);
    // eslint-disable-next-line
    jatos.startNextComponent(resultData);
};

const onCancelButtonClick = () => {
    // eslint-disable-next-line
    jatos.abortStudy('Worker pressed Cancel button');
};
</script>
