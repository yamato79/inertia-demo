<template>
    <v-card-content class="space-y-md">
        <div class="flex flex-col sm:flex-row items-center justify-between space-y-md sm:space-y-0">
            <div class="w-full">
                <v-text class="font-medium">
                    {{ resource.title }}
                </v-text>

                <v-text color="muted">
                    {{ resource.description }}
                </v-text>
            </div>

            <div class="flex-shrink-0">
                <v-button size="sm" @click="copyToClipboard(resource.content)">
                    Copy to Clipboard
                </v-button>
            </div>
        </div>

        <div>
            <v-form-editor :modelValue="resource.content" />
        </div>
    </v-card-content>
</template>

<script>
export default {
    name: "v-snippet-card-content",
    props: {
        resource: {
            type: Object,
            required: true,
        },
    },
    methods: {
        copyToClipboard(string) {
            navigator.clipboard.writeText(string);
            this.$toast().success("Copied to clipboard!");
        },
    },
}
</script>