<template>
    <a :href="resource.link" :target="resource.target" class="block hover:bg-gray-50">
        <v-card-content class="flex items-center justify-between space-x-md">
            <v-text color="primary">
                <a :href="resource.link" :target="resource.target" class="block font-medium">
                    {{ resource.title }}
                </a>
            </v-text>

            <div class="flex-shrink-0">
                <svg class="h-5 w-5 text-gray-400" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                    <path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd" />
                </svg>
            </div>
        </v-card-content>
    </a>
</template>

<script>
export default {
    name: "v-link-card-content",
    props: {
        resource: {
            type: Object,
            required: true,
        },
    },
}
</script>