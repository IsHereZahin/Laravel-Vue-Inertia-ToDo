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
                    'bg-red-100 text-red-500 border border-red-300': $page.props.flash.type === 'error',
                    'bg-blue-100 text-blue-500 border border-blue-300': $page.props.flash.type === 'info'
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
                        class="inline-flex items-center px-4 py-2 border border-transparent text-sm font-medium rounded-md text-white bg-gray-800 hover:bg-gray-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-gray-500"
                    >
                        Add Task
                    </Link>
                </div>

                <div class="overflow-x-auto mt-5">
                    <table class="min-w-full divide-y divide-gray-200">
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
                            <tr v-for="item in todos" :key="item.id">
                                <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">
                                    {{ item.id }}
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">
                                    {{ item.title }}
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                    {{ limitDescription(item.description) }}
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                    <!-- Conditional Button for Marking Complete/Incomplete -->
                                    <button
                                        v-if="!item.completed"
                                        @click="toggleCompletion(item, true)"
                                        class="h-8 px-4 text-white bg-gray-800 rounded hover:bg-gray-700 focus:ring-2 focus:ring-offset-2 focus:ring-black"
                                    >
                                        Mark as Complete
                                    </button>
                                    <button
                                        v-if="item.completed"
                                        @click="toggleCompletion(item, false)"
                                        class="h-8 px-4 text-black bg-gray-200 border border-black rounded hover:bg-gray-300 focus:ring-2 focus:ring-offset-2 focus:ring-black"
                                    >
                                        Mark as Incomplete
                                    </button>
                                    <br />
                                    <span class="text-gray-600">Due:
                                        <DateDisplay :date="item.due_date" :completed="item.completed" />
                                    </span>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
                                    <Link
                                        :href="route('todo.show', item.id)"
                                        class="text-gray-600 hover:text-black"
                                    >
                                        Show
                                    </Link>
                                    <Link
                                        :href="route('todo.edit', item.id)"
                                        class="ml-4 text-gray-600 hover:text-black"
                                    >
                                        Edit
                                    </Link>
                                    <button
                                        type="submit"
                                        @click="deleteTask(item.id)"
                                        class="ml-4 text-red-600 hover:text-black"
                                    >
                                        Delete
                                    </button>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>

            </div>
        </div>
    </AuthenticatedLayout>
</template>

<script setup>
import { ref, onMounted } from 'vue'; // Import Vue features
import { usePage, useForm } from '@inertiajs/vue3';
import DateDisplay from "@/components/DateDisplay.vue";
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
    console.log(props.flash); // Debugging flash message

    if (props.flash && props.flash.message) {
        flashVisible.value = true; // Show message
        setTimeout(() => {
            flashVisible.value = false; // Hide message
        }, 3000); // After 3 seconds
    }
});

// limit description to 5 words
const limitDescription = (description) => {
    if (!description) return 'No description available';

    let words = description.split(' ');
    if (words.length > 5) {
        words = words.slice(0, 5); // Take only the first 5 words
        return words.join(' ') + '...'; // Add ellipsis
    }
    return description;
};

// Function to delete a task
const form = useForm({}); // Initialize the form with inertia's useForm hook

const deleteTask = (id) => {
    if (confirm("Are you sure you want to delete this task?")) {
        form.delete(route('todo.destroy', id));
    }
};

// Function to toggle completion status
const toggleCompletion = (item, markComplete) => {
    const routePath = markComplete
        ? route('todo.complete', item.id)
        : route('todo.uncomplete', item.id);

    axios.patch(routePath)
        .then(() => {
            // Update the item's completed status locally
            item.completed = markComplete;
        })
        .catch((error) => {
            console.error(error);
        });
};
</script>
