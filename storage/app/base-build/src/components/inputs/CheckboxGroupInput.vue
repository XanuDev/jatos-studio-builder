<template>
    <div class="col-6 mx-auto my-2">
        <h4>{{ props.inputDataObject.label }}</h4>
        <div
            v-for="(item, index) in props.inputDataObject.values"
            :key="index"
            class="form-check"
        >
            <input
                type="checkbox"
                class="form-check-input"
                :id="props.inputDataObject.name + index"
                :name="props.inputDataObject.name + index"
                :value="item.value"
                :selected="item.selected"
                v-model="
                    $store.state.results[props.inputDataObject.name + index]
                "
            />
            <label
                class="form-check-label"
                :for="props.inputDataObject.name + index"
                >{{ item.label }}</label
            >
        </div>
    </div>
</template>
<script setup>
import { defineProps } from 'vue';

const props = defineProps({
    inputDataObject: Object,
});
</script>
