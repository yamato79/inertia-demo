<template>
    <div :class="classes">
        <slot />
    </div>
</template>

<script>
import { computed } from "vue";

export default {
    name: "v-section",
    setup() {
        const baseClasses = "space-y-lg";

        const compiledClasses = computed(() => `${baseClasses}`);

        return {
            classes: compiledClasses,
        };
    },
};
</script>