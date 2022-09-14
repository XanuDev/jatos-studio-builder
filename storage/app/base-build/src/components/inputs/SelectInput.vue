<template>
    <div class="form-group col-6 mx-auto my-2">
        <label :for="props.inputDataObject.name"
            ><span v-html="props.inputDataObject.label"></span
        ></label>
        <select
            class="form-control"
            :id="props.inputDataObject.name"
            :name="props.inputDataObject.name"
            :multiple="props.inputDataObject.multiple"
            v-model="$store.state.results[props.inputDataObject.name]"
        >
            <option
                v-for="(item, index) in props.inputDataObject.values"
                :key="index"
                :value="item.value"
            >
                {{ item.label }}
            </option>
        </select>
    </div>
</template>
<script setup>
import { defineProps } from 'vue';

const props = defineProps({
    inputDataObject: Object,
});
</script>
