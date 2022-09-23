<template>
    <div class="container text-center">
        <h1 class="my-4">
            {{ input.title }}
        </h1>
        <div v-html="input.contents"></div>
        <div class="wrapper mt-3">
            <section class="main-controls mt-3">
                <div class="progress" v-show="recording">
                    <div
                        class="progress-bar progress-bar-striped progress-bar-animated"
                        role="progressbar"
                        style="width: 100%"
                    ></div>
                </div>
                <div id="buttons">
                    <button
                        class="btn btn-outline-info m-2"
                        id="record"
                        :disabled="soundClip"
                    >
                        Record
                    </button>
                    <button
                        class="btn btn-outline-danger m2"
                        id="stop"
                        :disabled="!recording"
                    >
                        Stop
                    </button>
                </div>
            </section>

            <section v-show="soundClip">
                <audio src="" controls></audio>
                <button class="btn btn-danger" @click="soundClip = false">
                    Delete
                </button>
            </section>
        </div>
        <ButtonsComponent :resultDataObject="blob" :resultFile="filename" />
    </div>
</template>

<script setup>
import { onMounted, onBeforeMount, ref } from 'vue';
import ButtonsComponent from '../components/ButtonsComponent.vue';
import { useStore } from 'vuex';

const store = useStore();

const input = ref(null);

let record;
let stop;
let audio;
const blob = ref(null);
const soundClip = ref(false);
const recording = ref(false);
const filename = ref(null);

const mainFunction = () => {
    const constraints = { audio: true };
    let chunks = [];

    let onSuccess = function (stream) {
        const mediaRecorder = new MediaRecorder(stream);

        record.onclick = function () {
            mediaRecorder.start();
            recording.value = true;
            record.disabled = true;
        };

        stop.onclick = function () {
            mediaRecorder.stop();
            recording.value = false;
            record.disabled = false;
        };

        mediaRecorder.onstop = function () {
            filename.value = Date.now() + '.ogg';
            blob.value = new Blob(chunks, {
                type: 'audio/ogg; codecs=opus',
            });
            chunks = [];
            const audioURL = window.URL.createObjectURL(blob.value);
            audio.src = audioURL;
            soundClip.value = true;
        };

        mediaRecorder.ondataavailable = function (e) {
            chunks.push(e.data);
        };
    };

    let onError = function (err) {
        console.log('The following error occured: ' + err);
    };

    navigator.mediaDevices.getUserMedia(constraints).then(onSuccess, onError);
};

onBeforeMount(() => {
    input.value = store.getters.getInputByPos(store.state.position);
});

onMounted(() => {
    if (!navigator.mediaDevices.getUserMedia) {
        console.log('getUserMedia not supported on your browser!');
        return;
    }

    record = document.querySelector('#record');
    stop = document.querySelector('#stop');
    audio = document.querySelector('audio');

    mainFunction();
});
</script>
