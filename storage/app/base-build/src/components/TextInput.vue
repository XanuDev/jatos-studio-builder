<template>
    <div>
        {{ msg }}
        <button type="submit" class="btn btn-primary">Next</button>
    </div>
</template>

<script lang="ts">
import { Options, Vue } from "vue-class-component";

@Options({
    props: {
        msg: String,
    },
})
export default class TextInput extends Vue {
    msg!: string;
}
</script>

<!-- Add "scoped" attribute to limit CSS to this component only -->
<style scoped>
a {
    color: #42b983;
}
</style>
