<template>
    <h1 class="h3 mb-3"><strong>Builder</strong></h1>
    <div class="row">
        <div v-for="(input, index) in inputs" :key="index">
            {{ input.name }}
        </div>
        <div>
            <button v-if="!building" @click="buildProject">
                Build Project
            </button>
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
            <button
                v-if="builded"
                @click="downloadProject"
                class="btn btn-success"
            >
                Download
            </button>
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
const builded = ref(false);
const name = ref('');
const buildProject = () => {
    building.value = true;
    let data = { id: store.state.project_id };

    axios
        .post('/builder/build', data)
        .then((res) => {
            name.value = res.data.name;
            building.value = false;
            builded.value = true;
        })
        .catch((error) => {
            console.log(error);
        });
};

const downloadProject = () => {
    let data = { id: store.state.project_id };
    console.log(store.state.project_file);
    axios({
        url: 'builder/download',
        method: 'POST',
        responseType: 'blob',
        data: data,
    })
        .then((res) => {
            let blob = new Blob([res.data], {
                type: 'application/zip',
            });

            let link = document.createElement('a');
            link.href = window.URL.createObjectURL(blob);
            link.download = store.state.project_file;
            link.click();
        })
        .catch((error) => {
            console.log('Error downloading :' + error);
        });
};
</script>
