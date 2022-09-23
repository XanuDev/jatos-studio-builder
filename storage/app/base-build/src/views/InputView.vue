<template>
    <div>
        <h3 class="text-center">{{ input.title }}</h3>

        <form>
            <span v-for="(field, index) in input.fields" :key="index">
                <HeaderInput
                    v-if="field.type == 'header'"
                    :inputDataObject="field"
                />
                <ParagraphInput
                    v-else-if="field.type == 'paragraph'"
                    :inputDataObject="field"
                />
                <TextInput
                    v-else-if="field.type == 'text'"
                    :inputDataObject="field"
                />
                <DateInput
                    v-else-if="field.type == 'date'"
                    :inputDataObject="field"
                />
                <NumberInput
                    v-else-if="field.type == 'number'"
                    :inputDataObject="field"
                />
                <TextareaInput
                    v-else-if="field.type == 'textarea'"
                    :inputDataObject="field"
                />
                <CheckboxGroupInput
                    v-else-if="field.type == 'checkbox-group'"
                    :inputDataObject="field"
                />
                <RadioGroupInput
                    v-else-if="field.type == 'radio-group'"
                    :inputDataObject="field"
                />
                <SelectInput
                    v-else-if="field.type == 'select'"
                    :inputDataObject="field"
                />
            </span>
        </form>

        <div class="text-center">
            <ButtonsComponent :resultDataObject="$store.state.results" />
        </div>
    </div>
</template>
<script setup>
import { useStore } from 'vuex';
import { onBeforeMount, ref } from 'vue';
import ButtonsComponent from '../components/ButtonsComponent.vue';
import TextInput from '../components/inputs/TextInput.vue';
import HeaderInput from '../components/inputs/HeaderInput.vue';
import ParagraphInput from '../components/inputs/ParagraphInput.vue';
import DateInput from '../components/inputs/DateInput.vue';
import NumberInput from '../components/inputs/NumberInput.vue';
import TextareaInput from '../components/inputs/TextareaInput.vue';
import CheckboxGroupInput from '../components/inputs/CheckboxGroupInput.vue';
import RadioGroupInput from '../components/inputs/RadioGroupInput.vue';
import SelectInput from '../components/inputs/SelectInput.vue';

const store = useStore();

const input = ref(null);
onBeforeMount(() => {
    input.value = store.getters.getInputByPos(store.state.position);
});
</script>
