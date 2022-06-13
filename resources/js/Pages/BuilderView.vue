<template>
    <h1 class="h3 mb-3"><strong>Builder</strong></h1>
    <div class="row">
        <div v-for="(input, index) in inputs" :key="index">
            {{ input.name }}
        </div>
        <div>
            <button v-if="!building" @click="genJson">Generate json</button>
            <div v-else class="text-center">
                <span>Building...</span>
                <div class="progress">
                    <div
                        class="progress-bar progress-bar-striped progress-bar-animated"
                        role="progressbar"
                        aria-valuenow="100"
                        aria-valuemin="0"
                        aria-valuemax="100"
                        style="width: 100%"
                    ></div>
                </div>
            </div>
        </div>
    </div>
</template>

<script setup>
import axios from 'axios';
import { ref } from 'vue';
import { useStore } from 'vuex';

const store = useStore();

const inputs = [];
const building = ref(false);

const genJson = () => {
    building.value = true;
    let data = { id: store.state.project_id };

    axios
        .post('/builder/build', data)
        .then(() => {
            building.value = false;
        })
        .catch((error) => {
            console.log(error);
        });
};
</script>
