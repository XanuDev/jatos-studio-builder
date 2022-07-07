<template>
    <div>
        <div class="text-center">
            <h3>{{ input.title }}</h3>
            <p>{{ input.contents }}</p>
        </div>

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
            @click="emit('nextInput')"
        >
            Next
        </button>
        <button class="btn btn-danger mt-2 mx-1" @click="onCancelButtonClick">
            Cancel
        </button>
    </div>
</template>
<script setup>
import { useStore } from 'vuex';
import { onBeforeMount, defineEmits, ref } from 'vue';

const emit = defineEmits(['nextInput']);
const store = useStore();

const textInputValue = ref('');

const input = ref(null);
onBeforeMount(() => {
    input.value = store.getters.getInputByID(store.state.position);
});

// const onNextButtonClick = () => {
//     var resultData = {
//         name: textInputValue.value,
//     };
//     // eslint-disable-next-line
//     jatos.addJatosIds(resultData);
//     // eslint-disable-next-line
//     jatos.startNextComponent(resultData);
// };

const onCancelButtonClick = () => {
    // eslint-disable-next-line
    jatos.abortStudy('Worker pressed Cancel button');
};
</script>
