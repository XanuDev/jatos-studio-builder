<template>
  <div class="alert alert-success">
    <h1>{{ $store.getters.getKaixo }}</h1>
  </div>
</template>

<script lang="ts">
import { Vue } from "vue-class-component";

export default class KaixoView extends Vue {}
</script>
