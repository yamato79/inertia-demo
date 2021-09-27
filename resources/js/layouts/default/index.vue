<template>
    <div class="w-full min-h-full bg-gray-100 overflow-hidden">
        <div class="max-w-7xl mx-auto p-4 sm:p-6 lg:p-8">
            <div class="max-w-3xl mx-auto space-y-8">
                <img class="h-12" src="/images/logo.svg" />
                <slot />

                <v-section-group>
                    <v-text color="muted" class="text-center">
                        You may manage this data by visiting the admin area <v-link href="/admin/resources">here</v-link>.
                    </v-text>
                </v-section-group>
            </div>
        </div>
    </div>
</template>