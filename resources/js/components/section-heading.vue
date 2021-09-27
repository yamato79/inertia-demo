<template>
    <div class="w-full flex items-center justify-between">
        <div class="w-full">
            <h3 v-if="$slots.title" class="text-lg leading-6 font-medium text-gray-900">
                <slot name="title" />
            </h3>

            <v-text v-if="$slots.description" color="muted">
                <slot name="description" />
            </v-text>
        </div>

        <div class="flex-shrink-0">
            <slot name="actions" />
        </div>
    </div>
</template>

<script>
export default {
    name: "v-section-heading",
};
</script>