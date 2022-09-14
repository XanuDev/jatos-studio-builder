<template>
    <div class="col-6 mx-auto my-2">
        <h4>{{ props.inputDataObject.label }}</h4>
        <div
            v-for="(item, index) in props.inputDataObject.values"
            :key="index"
            class="form-check"
        >
            <input
                class="form-check-input"
                type="radio"
                :name="props.inputDataObject.name"
                :value="item.value"
                :id="props.inputDataObject.name + index"
                v-model="$store.state.results[props.inputDataObject.name]"
            />
            <label
                class="form-check-label"
                :for="props.inputDataObject.name + index"
            >
                <span v-html="item.label"></span>
            </label>
        </div>
    </div>
</template>
<script setup>
import { defineProps } from 'vue';

const props = defineProps({
    inputDataObject: Object,
});
</script>
