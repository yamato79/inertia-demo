<template>
    <v-section>
        <v-section-heading>
            <template v-slot:title>
                Resources
            </template>

            <template v-slot:description>
                View publicly available resources by clicking a resource type below.
            </template>
        </v-section-heading>

        <v-card>
            <template :key="'resourceType_' + resourceTypeIndex" v-for="(resourceType, resourceTypeIndex) in resourceTypes.data">
                <v-link :href="`/resources/${resourceType.slug}`" class="block hover:bg-gray-50">
                    <v-card-content class="flex items-center justify-between space-x-0 sm:space-x-md">
                        <div class="min-w-0 w-full flex items-center">
                            <div class="w-full flex flex-col">
                                <v-text color="primary" class="font-medium truncate">
                                    {{ resourceType.name }}
                                </v-text>

                                <v-text color="muted" class="truncate">
                                    {{ resourceType.description }}
                                </v-text>
                            </div>
                        </div>

                        <div class="flex-shrink-0">
                            <svg class="h-5 w-5 text-gray-400" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                <path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd" />
                            </svg>
                        </div>
                    </v-card-content>
                </v-link>
            </template>
        </v-card>
    </v-section>
</template>

<script>
import Layout from "../layouts/default/index.vue";

export default {
    layout: Layout,
    props: {
        resourceTypes: {
            type: Object,
            required: false,
            default: () => null,  
        },
    },
}
</script>
