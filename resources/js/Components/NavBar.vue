<template>
    <nav class="navbar navbar-expand-lg navbar-light bg-light px-3">
        <a class="navbar-brand" href="#">{{ $store.state.project_name }}</a>
        <ul class="navbar-nav mr-auto mx-auto">
            <li class="nav-item">
                <a
                    class="nav-link"
                    href="#"
                    id="show-modal"
                    @click="showModal = true"
                    >New Component</a
                >
            </li>
            <li class="nav-item">
                <a class="nav-link disabled" href="#">New Input</a>
            </li>
        </ul>
        <button
            class="btn btn-outline-primary mx-2 my-2 my-sm-0"
            @click="buildProject"
        >
            Generate
        </button>
        <button
            class="btn btn-outline-success my-2 my-sm-0"
            :disabled="!builded"
            @click="downloadProject"
        >
            Download
        </button>
    </nav>
    <Teleport to="body">
        <!-- use the modal component, pass in the prop -->
        <modal :show="showModal" @close="showModal = false">
            <template #header>
                <h3>Name</h3>
            </template>
            <template #body>
                <input
                    class="form-control"
                    type="text"
                    v-model="component_title"
                />
            </template>
            <template #footer>
                <button class="btn btn-outline-success" @click="newComponent">
                    Create
                </button></template
            >
        </modal>
    </Teleport>
    <!-- <nav class="nav nav-pills nav-justified">
        <router-link
            to="/"
            class="nav-item nav-link"
            :class="{ active: active === 'dashboard' }"
            @click="setActive('dashboard')"
            >Dashboard</router-link
        >
        <a
            href="#"
            class="nav-item nav-link"
            :class="{ active: active === 'input' }"
            @click="setActive('input')"
            >Input</a
        >
    </nav> -->
</template>

<script setup>
import axios from 'axios';
import { ref } from 'vue';
import { useStore } from 'vuex';
import Modal from './ModalComponent.vue';

const showModal = ref(false);
const store = useStore();
const component_title = ref('');

// const active = ref('');
// const setActive = (item) => {
//     active.value = item;
// };

const builded = ref(false);

const newComponent = () => {
    if (component_title.value == '') {
        console.log('error');
        return;
    }

    showModal.value = false;
};

const buildProject = () => {
    let data = { id: store.state.project_id };
    axios
        .post('/builder/build', data)
        .then((res) => {
            console.log(res.data.name);
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
