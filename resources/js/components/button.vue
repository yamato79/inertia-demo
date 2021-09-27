<template>
    <!--
        Return an href element if there's an href.
    -->
    <a :href="href" :class="classes" v-bind="attrs" v-if="href && anchor">
        <slot></slot>
    </a>
    <!--
        Return an href element if there's an href.
    -->
    <v-inertia-link :href="href" :class="classes" v-bind="attrs" v-else-if="href && !anchor">
        <slot></slot>
    </v-inertia-link>

    <!--
        Return a button element if there's no href.
    -->
    <button :class="classes" v-bind="attrs" v-else>
        <slot></slot>
    </button>
</template>

<script>
import { Link } from '@inertiajs/inertia-vue3';

export default {
    name: "v-button",
    inheritAttrs: false,
    components: {
        "v-inertia-link": Link,
    },
    props: {
        anchor: {
            type: Boolean,
            required: false,
            default: () => false,
        },
        href: {
            type: String,
            required: false,
            default: () => null,
        },
        color: {
            type: String,
            required: false,
            default: () => "primary",
        },
        size: {
            type: String,
            required: false,
            default: () => "md",
        },
        style: {
            type: String,
            required: false,
            default: () => "rounded",
        },
    },
    computed: {
        attrs() {
            return this.$attrs;
        },
    },
    setup(props) {
        // Base classes for the component.
        const baseClasses = "v-button inline-flex items-center justify-center border shadow-sm focus:outline-none focus:ring-2 focus:ring-offset-2 disabled:opacity-50 disabled:cursor-not-allowed";

        // List of available colors for the component.
        const colors = {
            primary: "border-primary-500 text-white bg-gradient-to-r from-primary-500 to-primary-600 hover:from-primary-600 focus:ring-primary-500",
            secondary: "border-gray-200 bg-white hover:bg-gray-50 focus:ring-gray-200",
            danger: "border-red-500 text-white bg-red-500 hover:bg-red-600 focus:ring-red-600",
        };

        // List of available sizes for the component.
        const sizes = {
            xs: "px-2.5 py-1.5 text-xs font-medium",
            sm: "px-3 py-2 text-sm font-medium",
            md: "px-4 py-2 text-base",
            lg: "px-4 py-2 text-base font-medium",
            xl: "px-6 py-3 text-base font-medium",
        };

        // List of available styles for the component.
        const styles = {
            none: "",
            rounded: "rounded-md",
        };

        const compiledClasses = () => {
            return `${baseClasses} ${colors[props.color]} ${sizes[props.size]} ${styles[props.style]}`;
        };

        return {
            classes: compiledClasses(),
        };
    },
};
</script>