<template>
    <Head title="Create Task" />

    <AuthenticatedLayout>
        <template #header>
            <h2 class="text-xl font-semibold leading-tight text-black">
                Create a New Task
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

                <!-- Card for the Form -->
                <div class="bg-white rounded-lg shadow-lg border border-black p-6">
                    <h3 class="text-xl font-semibold text-black mb-8">Task Information</h3>

                    <!-- Task Creation Form -->
                    <form @submit.prevent="submitForm" class="mt-5">
                        <div class="space-y-6">

                            <!-- Task Title -->
                            <div>
                                <label for="title" class="block text-sm font-medium text-black">Title</label>
                                <input
                                    type="text"
                                    id="title"
                                    name="title"
                                    v-model="form.title"
                                    class="mt-1 px-4 py-3 border border-black rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-black focus:border-black sm:text-sm w-full"
                                    placeholder="Enter task title"
                                    required
                                />
                                <p v-if="errors.title" class="text-red-500 text-sm mt-1">{{ errors.title }}</p>
                            </div>

                            <!-- Due Date -->
                            <div>
                                <label for="due_date" class="block text-sm font-medium text-black">Due Date</label>
                                <input
                                    type="date"
                                    id="due_date"
                                    name="due_date"
                                    v-model="form.due_date"
                                    class="mt-1 px-4 py-3 border border-black rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-black focus:border-black sm:text-sm w-full"
                                />
                                <p v-if="errors.due_date" class="text-red-500 text-sm mt-1">{{ errors.due_date }}</p>
                            </div>

                            <!-- Task Description -->
                            <div>
                                <label for="description" class="block text-sm font-medium text-black">Description</label>
                                <textarea
                                    id="description"
                                    name="description"
                                    v-model="form.description"
                                    rows="5"
                                    class="mt-1 px-4 py-3 border border-black rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-black focus:border-black sm:text-sm w-full"
                                    placeholder="Enter task description"
                                ></textarea>
                                <p v-if="errors.description" class="text-red-500 text-sm mt-1">{{ errors.description }}</p>
                            </div>

                            <!-- Submit Button -->
                            <div class="mt-6">
                                <button
                                    :disabled="form.processing"
                                    type="submit"
                                    class="inline-flex items-center px-6 py-3 border border-transparent text-sm font-medium rounded-md text-white bg-black hover:bg-gray-900 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-black"
                                >
                                    {{ form.processing? "Creating..." : "Create Task" }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>

            </div>
        </div>
    </AuthenticatedLayout>
</template>

<script setup>
import AuthenticatedLayout from "@/Layouts/AuthenticatedLayout.vue";
import { Head, Link, useForm } from "@inertiajs/vue3";

// Define props for validation errors
defineProps({
    errors: Object
});

const form = useForm({
    title: "",
    description: "",
    due_date: "",
});

// Submit form
const submitForm = () => {
    const response = form.post(route('todo.store'));
    if (response) {
        form.reset();
    }
};
</script>
