<template>
    <div :class="classes">
        <slot />
    </div>
</template>

<script>
import { computed } from "vue";

export default {
    name: "v-card-content",
    setup() {
        const baseClasses = "p-4 sm:p-6";

        const compiledClasses = computed(() => `${baseClasses}`);

        return {
            classes: compiledClasses,
        };
    },
};
</script>