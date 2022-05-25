<template>
    <div>
        <form>
            <div class="form-group">
                <label for="textinput">{{ msg }}</label>
                <input
                    type="text"
                    class="form-control"
                    id="textinput"
                    aria-describedby="textinput"
                />
                <small id="help" class="form-text text-muted">{{ help }}</small>
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
</template>

<script lang="ts">
import { Options, Vue } from "vue-class-component";

@Options({
    props: {
        msg: String,
        help: String,
    },
})
export default class TextForm extends Vue {
    msg!: string;
    help!: string;
}
</script>

<!-- Add "scoped" attribute to limit CSS to this component only -->
<style scoped>
a {
    color: #42b983;
}
</style>
