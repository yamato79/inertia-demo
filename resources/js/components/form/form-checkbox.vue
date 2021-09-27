<template>
    <label class="flex items-center space-x-sm py-sm border border-transparent disabled:opacity-50 disabled:cursor-not-allowed">
        <input type="checkbox" v-bind="attrs" v-model="value">
        <div>
            <slot />
        </div>
    </label>
</template>

<script>
export default {
    props: ["modelValue", "error"],
    emits: ["update:modelValue"],
    computed: {
        attrs() {
            return {
                ...this.$attrs,
                ...{
                    class: "v-form-checkbox focus:ring-blue-500 h-4 w-4 text-primary-600 border-gray-300 rounded",
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
