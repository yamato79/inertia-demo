<!-- This example requires Tailwind CSS v2.0+ -->
<template>
    <v-section class="flex flex-col">
        <v-section-heading>
            <template v-slot:title>
                Resources
            </template>

            <template v-slot:description>
                View and manage available resources from this page.
            </template>
        </v-section-heading>  

        <v-section-group class="space-y-md">
            <v-form class="flex flex-col sm:flex-row items-center justify-between space-x-0 sm:space-x-md space-y-md sm:space-y-0" @submit.prevent="filterResults">
                <v-section-group class="w-full sm:w-auto flex flex-col sm:flex-row items-center justify-between space-x-0 sm:space-x-md space-y-md sm:space-y-0">
                    <v-form-group class="w-full sm:w-auto">
                        <v-form-select v-model="filters.resource_type_id" name="resource_type_id" :options="resourceTypeOptions" />
                    </v-form-group>

                    <v-button type="submit" color="secondary" class="w-full sm:w-auto">
                        Filter Results
                    </v-button>
                </v-section-group>

                <v-button href="/admin/resources/create" color="primary" class="w-full sm:w-auto">
                    Create Resource
                </v-button>
            </v-form>

            <v-card>
                <v-table>
                    <v-table-head>
                        <v-table-row>
                            <v-table-header>Title</v-table-header>
                            <v-table-header class="hidden md:table-cell">Resource Type</v-table-header>
                        </v-table-row>
                    </v-table-head>

                    <v-table-body>
                        <v-table-row :key="'resource_' + resourceIndex" v-for="(resource, resourceIndex) in resources.data">
                            <v-table-data class="font-medium text-gray-900">
                                <v-link :href="`/admin/resources/${resource.resource_id}/edit`">
                                    {{ resource.title }}
                                </v-link>

                                <v-text color="muted" class="block md:hidden">
                                    {{ resource.resource_type.name }}    
                                </v-text>
                            </v-table-data>

                            <v-table-data class="hidden md:table-cell">
                                {{ resource.resource_type.name }}
                            </v-table-data>
                        </v-table-row>
                    </v-table-body>
                </v-table>

                <v-card-content v-if="resources.meta">
                    <nav class="w-full flex flex-col sm:flex-row space-y-sm sm:space-y-0 items-center justify-between" aria-label="Pagination">
                        <div class="w-full">
                            <p class="text-gray-700">
                                Showing
                                {{ ' ' }}
                                <span class="font-medium">
                                    {{ resources.meta.from || 0 }}
                                </span>
                                {{ ' ' }}
                                to
                                {{ ' ' }}
                                <span class="font-medium">
                                    {{ resources.meta.to }}
                                </span>
                                {{ ' ' }}
                                of
                                {{ ' ' }}
                                <span class="font-medium">
                                    {{ resources.meta.total }}
                                </span>
                                {{ ' ' }}
                                results
                            </p>
                        </div>

                        <div class="w-full flex-1 grid grid-cols-2 gap-md sm:flex justify-between sm:justify-end space-x-0 sm:space-x-sm">
                            <v-button :href="resources.meta.links[0].url" color="secondary" :disabled="resources.meta.current_page == 1">
                                Previous
                            </v-button>

                            <v-button :href="resources.meta.links[(resources.meta.links.length - 1)].url" color="secondary" :disabled="resources.meta.current_page < (resources.meta.total / resources.meta.per_page)">
                                Next
                            </v-button>
                        </div>
                    </nav>
                </v-card-content>
            </v-card>
        </v-section-group>
    </v-section>
</template>

<script>
import Layout from "../../../layouts/panel/index.vue";

export default {
    layout: Layout,
    props: {
        resources: {
            type: Object,
            required: false,
            default: () => null,
        },
        resourceTypes: {
            type: Object,
            required: true,
        },
        resourceTypeId: {
            type: String,
            required: false,
            default: () => 0,
        },
    },
    data() {
        return {
            filters: {
                resource_type_id: this.resourceTypeId || 0,
            },
        };
    },
    methods: {
        filterResults() {
            this.$inertia.reload({
                data: {
                    resource_type_id: this.filters.resource_type_id
                        ? this.filters.resource_type_id
                        : undefined,
                    page: 1,
                },
            });
        },
    },
    setup(props) {
        const resourceTypeOptions = props.resourceTypes.data.map((resourceType) => ({
            label: resourceType.name,
            value: resourceType.resource_type_id,
        }));

        return {
            resourceTypeOptions: [
                {
                    label: "All Resource Types",
                    value: 0,
                }, 
                ...resourceTypeOptions
            ],
        };
    },
}
</script>
