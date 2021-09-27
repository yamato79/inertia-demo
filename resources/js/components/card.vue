<template>
    <div :class="classes">
        <slot />
    </div>
</template>

<script>
import { computed } from "vue";

export default {
    name: "v-card",
    setup() {
        const baseClasses = "bg-white shadow overflow-hidden rounded-md divide-y divide-gray-200";

        const compiledClasses = computed(() => `${baseClasses}`);

        return {
            classes: compiledClasses,
        };
    },
};
</script>