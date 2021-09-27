<template>
    <p :class="classes">
        <slot />
    </p>
</template>

<script>
import { computed } from "vue";

export default {
    name: "v-text",
    props: {
        color: {
            type: String,
            required: false,
            default: () => "default",
        },
        size: {
            type: String,
            required: false,
            default: () => "md",
        },
    },
    setup(props) {
        const baseClasses = "max-w-full space-y-lg";

        const colors = {
            "default": "text-gray-800",
            "muted": "text-gray-500",
            "primary": "text-primary-500",
        };

        const sizes = {
            "xs": "text-xs",
            "sm": "text-sm",
            "md": "text-md",
            "lg": "text-lg",
            "xl": "text-xl",
        };

        const compiledClasses = computed(() => `${baseClasses} ${sizes[props.size]} ${colors[props.color]}`);

        return {
            classes: compiledClasses,
        };
    },
};
</script>