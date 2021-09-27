<template>
    <v-ace-editor
        v-model:value="input"
        :readonly="readonly"
        style="height: 300px"
        theme="chrome"
        mode="text"
    />
</template>

<script>
import { VAceEditor } from "vue3-ace-editor";
import "ace-builds/src-noconflict/theme-chrome";
import 'ace-builds/src-noconflict/mode-text';

export default {
    components: {
        "v-ace-editor": VAceEditor,
    },
    props: {
        modelValue: {
            type: String,
            default: "",
        },
        readonly: {
            type: Boolean,
            required: false,
            default: () => true,
        },
    },
    data() {
        return {
            input: null,
        }
    },
    watch: {
        modelValue: {
            handler(value) {
                this.input = value;
            },
            immediate: true,
        },
        input: {
            handler(value) {
                this.$emit("update:modelValue", value);
            },
        },
    },
}
</script>
