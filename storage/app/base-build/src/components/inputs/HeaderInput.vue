<template>
    <div class="form-group col-6 mx-auto my-2">
        <p v-html="props.inputDataObject.label"></p>
    </div>
</template>
<script setup>
import { defineProps } from 'vue';

const props = defineProps({
    inputDataObject: Object,
});
</script>
