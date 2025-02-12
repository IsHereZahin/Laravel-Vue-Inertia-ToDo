<template>
    <Head title="Your ToDo List" />

    <AuthenticatedLayout>
        <template #header>
            <h2 class="text-xl font-semibold leading-tight text-gray-800">
                Your ToDo List
            </h2>
        </template>

        <div class="py-5">
            <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
                <!-- Flash message with auto-hide -->
                <div v-if="flashVisible" class="alert p-4 rounded-lg" :class="{
                    'bg-green-100 text-green-500 border border-green-300': $page.props.flash.type === 'success',
                    'bg-red-100 text-red-500 border border-red-300': $page.props.flash.type === 'error'
                }">
                    <div class="flex items-center">
                        <!-- Success Icon -->
                        <svg v-if="$page.props.flash.type === 'success'" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" class="w-5 h-5 mr-3">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                        </svg>

                        <!-- Error Icon -->
                        <svg v-if="$page.props.flash.type === 'error'" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" class="w-5 h-5 mr-3">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                        </svg>

                        <!-- Message Text -->
                        <span class="text-sm font-semibold">{{ $page.props.flash.message }}</span>
                    </div>
                </div>

                <div class="flex items-center justify-between py-5">
                    <Link
                        :href="route('todo.create')"
                        class="inline-flex items-center px-4 py-2 border border-transparent text-sm font-medium rounded-md text-white bg-black hover:bg-gray-800 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-gray-500"
                    >
                        Add Task
                    </Link>
                </div>

                <table class="min-w-full divide-y divide-gray-200 mt-5">
                    <thead class="bg-gray-50">
                        <tr>
                            <th scope="col" class="px-6 py-3 text-left text-sm font-medium text-gray-500 uppercase tracking-wider">
                                #
                            </th>
                            <th scope="col" class="px-6 py-3 text-left text-sm font-medium text-gray-500 uppercase tracking-wider">
                                Title
                            </th>
                            <th scope="col" class="px-6 py-3 text-left text-sm font-medium text-gray-500 uppercase tracking-wider">
                                Description
                            </th>
                            <th scope="col" class="px-6 py-3 text-left text-sm font-medium text-gray-500 uppercase tracking-wider">
                                Status & Due Date
                            </th>
                            <th scope="col" class="px-6 py-3 text-left text-sm font-medium text-gray-500 uppercase tracking-wider">
                                Actions
                            </th>
                        </tr>
                    </thead>
                    <tbody class="bg-white divide-y divide-gray-200">
                        <tr
                            v-for="item in todos"
                            :key="item.id"
                        >
                            <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">
                                {{ item.id }}
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">
                                {{ item.title }}
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                {{ item.description ? item.description : 'No description available' }}
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                {{
                                    item.completed === 0 ? 'Incomplete' : (item.completed === 1 ? 'Complete' : 'Unknown')
                                }}
                                <br>
                                <span class="text-gray-400">Due: {{ item.due_date ? new Date(item.due_date).toLocaleDateString() : 'No due date' }}</span>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
                                <Link
                                    :href="route('todo.edit', item.id)"
                                    class="text-gray-600 hover:text-black"
                                >
                                    Edit
                                </Link>
                                <Link
                                    :href="route('todo.destroy', item.id)"
                                    class="ml-4 text-red-600 hover:text-black"
                                >
                                    Delete
                                </Link>
                            </td>
                        </tr>
                    </tbody>
                </table>

            </div>
        </div>
    </AuthenticatedLayout>
</template>

<script setup>
import { ref, onMounted } from 'vue'; // Import Vue features
import { usePage } from '@inertiajs/vue3'; // Access Inertia page data
import AuthenticatedLayout from "@/Layouts/AuthenticatedLayout.vue"; // Layout for the page
import { Head, Link } from '@inertiajs/vue3'; // Head for metadata, Link for navigation

// Define props (todos)
defineProps({
    todos: Array, // Expect todos array
});

// Access page data
const { props } = usePage();

// Flash message visibility
const flashVisible = ref(false);

// Show message if it exists, hide after 3 seconds
onMounted(() => {
    if (props.flash && props.flash.message) {
        flashVisible.value = true; // Show message
        setTimeout(() => {
            flashVisible.value = false; // Hide message
        }, 3000); // 3 seconds
    }
});
</script>
