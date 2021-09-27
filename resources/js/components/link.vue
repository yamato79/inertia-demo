<template>
    <inertia-link class="text-primary-500 hover:text-primary-600">
        <slot />
    </inertia-link>
</template>

<script>
import { Link } from '@inertiajs/inertia-vue3';

export default {
    components: {
        "inertia-link": Link,
    },
};
</script>

