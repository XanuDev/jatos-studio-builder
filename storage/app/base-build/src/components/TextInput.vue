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
        <ButtonsComponent />
    </div>
</template>
<script setup>
import { useStore } from 'vuex';
import { onBeforeMount, ref } from 'vue';
import ButtonsComponent from './ButtonsComponent.vue';

const store = useStore();

const textInputValue = ref('');

const input = ref(null);
onBeforeMount(() => {
    input.value = store.getters.getInputByID(store.state.position);
});
</script>
