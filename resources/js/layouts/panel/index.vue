<template>
    <div class="relative h-screen flex overflow-hidden bg-gray-100">
        <TransitionRoot as="template" :show="sidebarOpen">
            <Dialog as="div" class="fixed inset-0 flex z-40 lg:hidden" @close="sidebarOpen = false">
                <TransitionChild as="template" enter="transition-opacity ease-linear duration-300" enter-from="opacity-0" enter-to="opacity-100" leave="transition-opacity ease-linear duration-300" leave-from="opacity-100" leave-to="opacity-0">
                    <DialogOverlay class="fixed inset-0 bg-gray-600 bg-opacity-75" />
                </TransitionChild>

                <TransitionChild as="template" enter="transition ease-in-out duration-300 transform" enter-from="-translate-x-full" enter-to="translate-x-0" leave="transition ease-in-out duration-300 transform" leave-from="translate-x-0" leave-to="-translate-x-full">
                    <div class="relative flex-1 flex flex-col max-w-xs w-full pt-5 pb-4 bg-white">
                        <TransitionChild as="template" enter="ease-in-out duration-300" enter-from="opacity-0" enter-to="opacity-100" leave="ease-in-out duration-300" leave-from="opacity-100" leave-to="opacity-0">
                            <div class="absolute top-0 right-0 -mr-12 pt-2">
                                <button type="button" class="ml-1 flex items-center justify-center h-10 w-10 rounded-full focus:outline-none focus:ring-2 focus:ring-inset focus:ring-white" @click="sidebarOpen = false">
                                    <span class="sr-only">Close sidebar</span>
                                    <XIcon class="h-6 w-6 text-white" aria-hidden="true" />
                                </button>
                            </div>
                        </TransitionChild>

                        <div class="flex-shrink-0 flex items-center px-4">
                            <img class="h-8 w-auto" src="/images/logo.svg" />
                        </div>

                        <div class="mt-5 flex-1 h-0 overflow-y-auto">
                            <nav class="px-2">
                                <div class="space-y-1">
                                    <v-link v-for="item in navigation" :key="item.name" :href="item.href" :class="[item.current ? 'bg-gray-100 text-gray-900' : 'text-gray-600 hover:text-gray-900 hover:bg-gray-50', 'group flex items-center px-4 py-2 text-base leading-5 font-medium rounded-md']" :aria-current="item.current ? 'page' : undefined">
                                        {{ item.name }}
                                    </v-link>
                                </div>
                            </nav>
                        </div>
                    </div>
                </TransitionChild>

                <div class="flex-shrink-0 w-14" aria-hidden="true" />
            </Dialog>
        </TransitionRoot>

        <!-- Static sidebar for desktop -->
        <div class="hidden lg:flex lg:flex-shrink-0">
            <div class="flex flex-col w-64 pt-5 pb-4 bg-white">
                <div class="flex items-center flex-shrink-0 px-6">
                    <img class="h-12 w-auto" src="/images/logo.svg" />
                </div>

                <div class="h-0 flex-1 flex flex-col overflow-y-auto">
                    <!-- Navigation -->
                    <nav class="px-3 mt-6">
                        <div class="space-y-sm">
                            <v-link v-for="item in navigation" :key="item.name" :href="item.href" :class="[item.current ? 'bg-gray-200 text-gray-900' : 'text-gray-700 hover:text-gray-900 hover:bg-gray-50', 'group flex items-center px-4 py-2 font-medium rounded-md']" :aria-current="item.current ? 'page' : undefined">
                                {{ item.name }}
                            </v-link>
                        </div>
                    </nav>
                </div>
            </div>
        </div>

    <!-- Main column -->
    <div class="flex flex-col w-0 flex-1 overflow-hidden">
        <div class="relative z-10 flex-shrink-0 flex h-16 bg-white border-b border-gray-200 lg:hidden">
            <button type="button" class="px-4 border-r border-gray-200 text-gray-500 focus:outline-none focus:ring-2 focus:ring-inset focus:ring-primary-500 lg:hidden" @click="sidebarOpen = true">
                <span class="sr-only">Open sidebar</span>
                <MenuAlt1Icon class="h-6 w-6" aria-hidden="true" />
            </button>

            <div class="h-full flex items-center px-md">
                <img class="h-8 w-auto" src="/images/logo.svg" />
            </div>
        </div>
        
        <main class="flex-1 relative z-0 overflow-y-auto focus:outline-none">
            <div class="max-w-7xl mx-auto p-4 sm:p-6 lg:p-8">
                <div class="max-w-4xl mx-auto">
                    <slot />
                </div>
            </div>
        </main>
    </div>
  </div>
</template>

<script>
import { ref } from 'vue'
import {
  Dialog,
  DialogOverlay,
  Menu,
  MenuButton,
  MenuItem,
  MenuItems,
  TransitionChild,
  TransitionRoot,
} from '@headlessui/vue'
import { HomeIcon, MenuAlt1Icon, XIcon } from '@heroicons/vue/outline'
import {
  ChevronRightIcon,
  DotsVerticalIcon,
  DuplicateIcon,
  PencilAltIcon,
  SearchIcon,
  SelectorIcon,
  TrashIcon,
  UserAddIcon,
} from '@heroicons/vue/solid'

const navigation = [
  { name: 'Home', href: '/', current: false },
  { name: 'Resources', href: '/admin/resources', current: true },
]

export default {
  components: {
    Dialog,
    DialogOverlay,
    Menu,
    MenuButton,
    MenuItem,
    MenuItems,
    TransitionChild,
    TransitionRoot,
    ChevronRightIcon,
    DotsVerticalIcon,
    DuplicateIcon,
    MenuAlt1Icon,
    PencilAltIcon,
    SearchIcon,
    SelectorIcon,
    TrashIcon,
    UserAddIcon,
    XIcon,
  },
  setup() {
    const sidebarOpen = ref(false)

    return {
      navigation,
      sidebarOpen,
    }
  },
}
</script>