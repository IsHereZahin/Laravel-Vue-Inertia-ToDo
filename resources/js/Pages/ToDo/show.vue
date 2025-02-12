<template>
    <Head :title="task.title" />

    <AuthenticatedLayout>
        <template #header>
            <h2 class="text-xl font-semibold leading-tight text-black">
                {{ task.title }}
            </h2>
        </template>

        <div class="py-12 pt-10 pb-10 px-5">
            <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
                <!-- Back Button -->
                <div class="mb-6">
                    <Link
                        :href="route('todo.index')"
                        class="inline-flex items-center px-4 py-2 border border-black text-sm font-medium rounded-md text-black bg-white hover:bg-gray-200 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-black"
                    >
                        &larr; Back to Task List
                    </Link>
                </div>

                <div v-if="$page.props.flash.message" class="alert">
                    {{ $page.props.flash.message }}
                </div>

                <!-- Task Details Card -->
                <div class="bg-white rounded-lg shadow-lg border border-black p-6">
                    <h3 class="text-xl font-semibold text-black mb-8">Task Details</h3>

                    <div class="space-y-4">
                        <!-- Task Title -->
                        <div>
                            <p class="text-sm font-medium text-black">Title:</p>
                            <p class="text-lg text-gray-800">{{ task.title }}</p>
                        </div>

                        <!-- Due Date -->
                        <div v-if="task.due_date">
                            <p class="text-sm font-medium text-black">Due Date:</p>
                            <p class="text-lg text-gray-800">
                                <DateDisplay :date="task.due_date" />
                            </p>
                        </div>

                        <!-- Task Description -->
                        <div>
                            <p class="text-sm font-medium text-black">Description:</p>
                            <p class="text-gray-800">{{ task.description || 'No description provided.' }}</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </AuthenticatedLayout>
</template>

<script setup>
import AuthenticatedLayout from "@/Layouts/AuthenticatedLayout.vue";
import DateDisplay from "@/components/DateDisplay.vue";
import { Head, Link } from "@inertiajs/vue3";

// Props for task data
const props = defineProps({
    task: Object,
});
</script>
