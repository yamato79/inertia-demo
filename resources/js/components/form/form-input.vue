<template>
    <template v-if="attrs.type == 'textarea'">
        <textarea v-bind="attrs" v-model="value" rows="5"></textarea>
    </template>

    <template v-else>
        <input v-bind="attrs" v-model="value">
    </template>
</template>

<script>
export default {
    name: "v-form-input",
    props: ["modelValue"],
    emits: ["update:modelValue"],
    computed: {
        attrs() {
            return {
                ...this.$attrs,
                ...{
                    class: "block w-full focus:ring-primary-500 focus:border-primary-500 border-gray-200 rounded-md disabled:opacity-50 disabled:cursor-not-allowed",
                },
            };
        },
        value: {
            get() {
                return this.modelValue;
            },
            set(value) {
                this.$emit("update:modelValue", value);
            }
        }
    },
};
</script>