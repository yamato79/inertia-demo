<template>
    <input type="file" v-bind="attrs">
</template>

<script>
export default {
    name: "v-form-file",
    computed: {
        attrs() {
            return {
                ...this.$attrs,
                ...{
                    class: "py-1.5 block w-full focus:ring-primary-500 rounded-md focus:border-primary-500 border-gray-200 disabled:opacity-50 disabled:cursor-not-allowed",
                },
            };
        },
    },
};
</script>