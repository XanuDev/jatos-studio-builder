<template>
    <div>
        <div class="text-center">
            <h3>{{ input.title }}</h3>
            <div v-html="input.contents"></div>
        </div>

        <div class="form-group">
            <input
                type="text"
                class="form-control"
                id="text"
                v-model="textInputValue"
            />
        </div>
        <ButtonsComponent :resultDataObject="result" />
    </div>
</template>
<script setup>
import { useStore } from 'vuex';
import { onBeforeMount, ref } from 'vue';
import ButtonsComponent from './ButtonsComponent.vue';

const store = useStore();

const textInputValue = ref('');
const result = ref({ text: textInputValue });

const input = ref(null);
onBeforeMount(() => {
    input.value = store.getters.getInputByID(store.state.position);
});
</script>
