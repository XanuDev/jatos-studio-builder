<template>
    <div class="container text-center">
        <h1 class="my-4">
            {{ $store.state.inputs[$store.state.position].text }}
        </h1>
        <button
            class="btn btn-primary"
            @click="
                nextInput(
                    $store.state.inputs[$store.state.position + 1].component
                )
            "
        >
            Start
        </button>
    </div>
</template>

<script setup>
const nextInput = (input) => {
    store.commit('setActive', input);
};
</script>
