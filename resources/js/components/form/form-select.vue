<template>
    <select v-model="value" v-bind="attrs">
        <template :key="'option_' + optionIndex" v-for="(option, optionIndex) in options">
            <option :value="option.value">
                {{ option.label }}
            </option>
        </template>
    </select>
</template>

<script>
export default {
    name: "v-form-select",
    props: [
        "modelValue",
        "options",
    ],
    emits: ["update:modelValue"],
    computed: {
        attrs() {
            return {
                ...this.$attrs,
                ...{
                    class: "block w-full pl-3 pr-10 py-2 text-base border-gray-200 focus:outline-none focus:ring-primary-500 focus:border-primary-500 rounded-md disabled:opacity-50 disabled:cursor-not-allowed",
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
}
</script>