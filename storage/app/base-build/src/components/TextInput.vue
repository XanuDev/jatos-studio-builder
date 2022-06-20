<template>
    <div class="text-center">
        <h3>{{ $store.state.inputs[$store.state.position].title }}</h3>
        <p>{{ $store.state.inputs[$store.state.position].text }}</p>
    </div>
    <form>
        <div class="form-group">
            <label for="text">Froga</label>

            <input
                type="text"
                class="form-control"
                id="text"
                v-model="textInputValue"
            />
        </div>

        <button
            type="submit"
            class="btn btn-primary mt-2 mx-1"
            @click="onNextButtonClick"
        >
            Next
        </button>
        <button class="btn btn-danger mt-2 mx-1" @click="onCancelButtonClick">
            Cancel
        </button>
    </form>
</template>
<script setup>
import { ref } from 'vue';

const textInputValue = ref('');

const onNextButtonClick = () => {
    var resultData = {
        name: textInputValue.value,
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
