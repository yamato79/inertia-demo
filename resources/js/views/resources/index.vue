<template>
    <v-section>
        <v-text>
            <v-link href="/" class="flex items-center">
                <v-icon-arrow-narrow-left class="mr-3 h-5 w-5" />
                Back
            </v-link>
        </v-text>

        <v-section-heading>
            <template v-slot:title>
                {{ resourceType.name }}
            </template>

            <template v-slot:description>
                {{ resourceType.description }}
            </template>
        </v-section-heading>

        <v-section-group>
            <v-card>
                <template :key="'resource_' + resourceIndex" v-for="(resource, resourceIndex) in resources.data">
                    <component
                        :is="`v-${resourceType.slug}-card-content`"
                        :resource="resource"
                    />
                </template>
            </v-card>
        </v-section-group>
    </v-section>
</template>

<script>
import Layout from "../../layouts/default/index.vue";
import { ArrowNarrowLeftIcon } from "@heroicons/vue/outline";
import DocumentCardContent from "./fragments/document-card-content.vue";
import LinkCardContent from "./fragments/link-card-content.vue";
import SnippetCardContent from "./fragments/snippet-card-content.vue";

export default {
    layout: Layout,
    components: {
        "v-icon-arrow-narrow-left": ArrowNarrowLeftIcon,
        "v-document-card-content": DocumentCardContent,
        "v-link-card-content": LinkCardContent,
        "v-snippet-card-content": SnippetCardContent,
    },
    props: {
        resources: {
            type: Object,
            required: false,
            default: () => null,
        },
        resourceType: {
            type: Object,
            required: true,
        },
    },
}
</script>