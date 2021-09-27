<template>
    <v-section class="">
        <v-text>
            <v-link href="/admin/resources" class="flex items-center">
                <v-icon-arrow-narrow-left class="mr-3 h-5 w-5" />
                Back
            </v-link>
        </v-text>

        <v-section-heading>
            <template v-slot:title>
                <template v-if="hasResource">
                    {{ resource.data.title }}
                </template>

                <template v-else>
                    Create Resource
                </template>
            </template>

            <template v-slot:description>
                <template v-if="hasResource">
                    Edit the resource information with the form below.
                </template>

                <template v-else>
                    Create a new resource by filling up the form below.
                </template>
            </template>
        </v-section-heading>        

        <v-card>
            <v-card-content>
                <form class="space-y-md" enctype="multipart/form-data" @submit.prevent="submitForm">
                    <div class="grid grid-cols-1 gap-y-md sm:grid-cols-6 sm:gap-x-md">
                        <div class="sm:col-span-3">
                            <v-form-label>Title</v-form-label>
                            <v-form-input v-model="resourceForm.title" type="text" :disabled="isLoading" :required="true" />
                        </div>

                        <div class="sm:col-span-3">
                            <v-form-label>Resource Type</v-form-label>
                            <v-form-select v-model="resourceForm.resource_type_id" :options="resourceTypeOptions" :disabled="hasResource || isLoading" :required="true" />
                        </div>
                    </div>

                    <!--
                        Fields to display if the resource type slug is document.
                    -->
                    <template v-if="resourceForm.resource_type_id == 1">
                        <div class="grid grid-cols-1 gap-y-md sm:grid-cols-6 sm:gap-x-md">
                            <div v-if="resourceForm.file_path" class="sm:col-span-3">
                                <v-form-group>
                                    <v-form-label>Current File</v-form-label>
                                    <v-text color="primary">
                                        <a :href="`/resources/${resourceForm.resource_id}/download`" class="block">
                                            {{ resourceForm.file_name }}
                                        </a>
                                    </v-text>
                                </v-form-group>
                            </div>

                            <div class="sm:col-span-3">
                                <v-form-group>
                                    <v-form-label>Upload File (Max 2MB)</v-form-label>
                                    <v-form-file ref="file" :disabled="isLoading" :required="!resourceForm.file_path" @change="onSelectFile" />
                                </v-form-group>
                            </div>
                        </div>
                    </template>

                    <!--
                        Fields to display if the resource type slug is link.
                    -->
                    <template v-else-if="resourceForm.resource_type_id == 2">
                        <div class="grid grid-cols-1 gap-y-md sm:grid-cols-6 sm:gap-x-md">
                            <div class="sm:col-span-3">
                                <v-form-label>Link</v-form-label>
                                <v-form-input v-model="resourceForm.link" type="text" :disabled="isLoading" :required="true" />
                            </div>

                            <div class="sm:col-span-3">
                                <v-form-label>Options</v-form-label>
                                <v-form-checkbox v-model="resourceForm.open_new_tab" :value="true" :disabled="isLoading">
                                    Open in a new tab
                                </v-form-checkbox>
                            </div>
                        </div>
                    </template>

                    <!--
                        Fields to display if the resource type slug is snippet.
                    -->
                    <template v-else-if="resourceForm.resource_type_id == 3">
                        <v-form-group>
                            <v-form-label>Description</v-form-label>
                            <v-form-input v-model="resourceForm.description" type="textarea" :disabled="isLoading" :required="true" />
                        </v-form-group>

                        <v-form-group>
                            <v-form-label>Content</v-form-label>
                            <v-form-editor v-model="resourceForm.content" :readonly="false" :disabled="isLoading" :required="true" />
                        </v-form-group>
                    </template>

                    <!--
                        The display if there is no resource type.
                    -->
                    <template v-else>
                        <div class="p-md bg-gray-50 text-center rounded-md">
                            <v-text>Please select a resource type.</v-text>
                        </div>
                    </template>

                    <div class="flex justify-between">
                        <div />

                        <div class="w-full sm:w-auto flex space-x-md">
                            <div v-if="hasResource" class="w-full flex flex-col sm:flex-row space-y-md sm:space-y-0 space-x-0 sm:space-x-md">
                                <v-button class="w-full sm:w-auto" href="#" color="secondary" :disabled="isLoading" @click="deleteResource">
                                    <span class="py-1 hidden sm:block">
                                        <v-icon-trash class="h-5 w-5" />
                                    </span>

                                    <span class="block sm:hidden">
                                        Delete Resource
                                    </span>
                                </v-button>

                                <v-button class="w-full sm:w-auto" color="primary" :disabled="isLoading">
                                    Save Changes
                                </v-button>
                            </div>

                            <div v-else class="w-full">
                                <v-button color="primary" class="w-full sm:w-auto" :disabled="isLoading">
                                    Save Resource
                                </v-button>
                            </div>
                        </div>
                    </div>
                </form>
            </v-card-content>
        </v-card>
    </v-section>
</template>

<script>
import { ArrowNarrowLeftIcon, TrashIcon } from "@heroicons/vue/outline";
import ResourceService from "../../../services/modules/resource-service";
import Layout from "../../../layouts/panel/index.vue";

export default {
    layout: Layout,
    components: {
        "v-icon-arrow-narrow-left": ArrowNarrowLeftIcon,
        "v-icon-trash": TrashIcon,
    },
    props: {
        resource: {
            type: Object,
            required: false,
            default: () => null,
        },
        resourceTypes: {
            type: Object,
            required: true,
        },
    },
    data() {
        return {
            isLoading: false,
            resourceForm: {
                title: null,
                resource_type_id: null,
                content: "",
                description: null,
                file_path: null,
                file_name: null,
                link: null,
                target: null,
                file: null,
                open_new_tab: false,
            },
            errors: {},
        };
    },
    computed: {
        hasResource() {
            return (this.resource && this.resource.data && this.resource.data.resource_id) ? true : false;
        },
        resourceTypeOptions() {
            if (!this.resourceTypes.data) return [];

            return this.resourceTypes.data.map((resourceType) => ({
                label: resourceType.name,
                value: resourceType.resource_type_id,
            }));
        },
        payload() {
            const formData = new FormData();

            // Common Fields
            formData.append("title", this.resourceForm.title);
            formData.append("resource_type_id", this.resourceForm.resource_type_id);

            // Document
            if (this.resourceForm.resource_type_id == 1) {
                formData.append("file", this.resourceForm.file);
            }

            // Link
            if (this.resourceForm.resource_type_id == 2) {
                formData.append("link", this.resourceForm.link);
                formData.append("open_new_tab", this.resourceForm.open_new_tab);
            }

            // Snippet
            if (this.resourceForm.resource_type_id == 3) {
                formData.append("content", this.resourceForm.content);
                formData.append("description", this.resourceForm.description);
            }

            return formData;
        },
        headers() {
            if (this.resourceForm.resource_type_id == 1) {
                return {
                    "content-type": "multipart/form-data",
                };
            }

            return {};
        },
    },
    watch: {
        resource: {
            handler(value) {
                if (!value || !value.data) return;
                this.resourceForm.resource_id = value.data.resource_id || null;
                this.resourceForm.title = value.data.title || null;
                this.resourceForm.resource_type_id = value.data.resource_type_id || null;
                this.resourceForm.content = value.data.content || null;
                this.resourceForm.description = value.data.description || null;
                this.resourceForm.file_path = value.data.file_path || null;
                this.resourceForm.file_name = value.data.file_name || null;
                this.resourceForm.link = value.data.link || null;
                this.resourceForm.open_new_tab = (value.data.target == "_blank");
            },
            immediate: true,
            deep: true,
        },
    },
    methods: {
        submitForm() {
            this.toggleLoading();

            const operation = this.hasResource
                ? this.saveChanges()
                : this.createResource();

            operation
                .then((response) => {
                        this.$toast().success(response.data.meta.message);

                        if (!this.hasResource) {
                            this.$inertia.get(`/admin/resources/${response.data.data.resource_id}/edit`);
                        } else {
                            this.$inertia.reload();
                        }
                    })
                    .catch((error) => {
                        this.$toast().danger(Object.values(error.response.data.errors)[0]);
                        this.errors = error.response.data.errors;
                    })
                    .finally(() => {
                        this.toggleLoading();
                    });
        },
        saveChanges() {
            return ResourceService.update(this.resource.data.resource_id, this.payload, this.headers)
        },
        createResource() {
            return ResourceService.store(this.payload, this.headers)
        },
        deleteResource() {
            const operation = () => ResourceService.delete(this.resource.data.resource_id);
            
            this.$alert().confirm(operation)
                .then((response) => {
                    if(response) {
                        this.$toast().success("Resource deleted.");
                        this.$inertia.get("/admin/resources");
                    }
                })
                .catch((error) => {
                    this.$toast().danger(error.response.data.message);
                });
        },
        onSelectFile(e) {
            var files = e.target.files || e.dataTransfer.files;

            if (!files.length) {
                return;
            }

            this.resourceForm.file = files[0];
        },
        toggleLoading() {
            this.isLoading = !this.isLoading;
        },
    },
}
</script>
