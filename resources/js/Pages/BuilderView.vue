<template>
    <h1 class="h3 mb-3"><strong>Builder</strong></h1>
    <div class="row">
        <div v-for="(input, index) in inputs" :key="index">
            {{ input.name }}
        </div>
        <div>
            <button @click="genJson">Generate json</button>
        </div>
    </div>
</template>

<script>
export default {
    setup: () => ({}),
};
</script>
