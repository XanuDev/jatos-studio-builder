<template>
    <div class="form-group col-6 mx-auto my-2">
        <label :for="props.name"
            ><span v-html="props.inputDataObject.label"></span
        ></label>
        <input
            type="number"
            class="form-control"
            :id="props.inputDataObject.name"
            :name="props.inputDataObject.name"
            :placeholder="props.inputDataObject.placeholder"
            :required="props.inputDataObject.required"
            v-model="$store.state.results[props.inputDataObject.name]"
        />
        <small id="emailHelp" class="form-text text-muted"
            ><span v-html="props.inputDataObject.description"></span
        ></small>
    </div>
</template>
<script setup>
import { defineProps } from 'vue';

const props = defineProps({
    inputDataObject: Object,
});
</script>
