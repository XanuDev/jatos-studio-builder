<template>
    <div class="form-group col-6 mx-auto my-2">
        <label :for="props.inputDataObject.name"
            ><span v-html="props.inputDataObject.label"></span
        ></label>
        <textarea
            class="form-control"
            :id="props.inputDataObject.name"
            :name="props.inputDataObject.name"
            :required="props.inputDataObject.required"
            v-model="$store.state.results[props.inputDataObject.name]"
            rows="3"
        ></textarea>
    </div>
</template>
<script setup>
import { defineProps } from 'vue';

const props = defineProps({
    inputDataObject: Object,
});
</script>
