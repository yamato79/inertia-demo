<template>
    <v-card-content class="w-full flex flex-col sm:flex-row items-center justify-between space-y-md sm:space-y-0">
        <v-text class="w-full text-center sm:text-left">
            <a :href="resource.link" :target="resource.target" class="block font-medium">
                {{ resource.title }}
            </a>
        </v-text>

        <div class="flex-shrink-0">
            <v-button :href="`/resources/${resource.resource_id}/download`" size="sm" anchor>
                Download
            </v-button>
        </div>
    </v-card-content>
</template>

<script>
export default {
    name: "v-document-card-content",
    props: {
        resource: {
            type: Object,
            required: true,
        },
    },
}
</script>