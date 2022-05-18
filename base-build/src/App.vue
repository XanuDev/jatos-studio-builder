<template>
  <div class="main">
    <main class="content">
      <div class="container-fluid p-0">
        <router-view />
      </div>
    </main>
  </div>
</template>

<script lang="ts">
import { Options, Vue } from "vue-class-component";
import HomeView from "@/components/HomeView.vue";
import TextFormInput from "@/components/TextFormInput.vue";
import TextInput from "@/components/TextInput.vue";

@Options({
  components: {
    HomeView,
    TextFormInput,
    TextInput,
  },
})
export default class AppView extends Vue {}
</script>
