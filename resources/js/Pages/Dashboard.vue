<template>
    <Head title="Dashboard" />

    <AuthenticatedLayout>
        <template #header>
            <h2 class="text-xl font-semibold leading-tight text-black">
                Dashboard
            </h2>
        </template>

        <!-- Total Todos Section -->
        <div class="py-4 mt-4">
            <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
                <div
                    class="overflow-hidden bg-white sm:rounded-lg border border-gray-300"
                >
                    <div
                        class="p-6 bg-white text-black rounded-lg flex justify-between items-center"
                    >
                        <div>
                            <h3 class="font-semibold text-xl">
                                Total Todos for Today
                            </h3>
                            <p class="text-gray-700 mt-2 text-lg">
                                Total Todos:
                                <span class="font-bold">{{
                                    incompleteTodos.length +
                                    completedTodos.length
                                }}</span>
                            </p>
                        </div>

                        <!-- Add Task Button -->
                        <Link
                            :href="route('todo.create')"
                            class="inline-flex items-center px-4 py-2 border border-transparent text-sm font-medium rounded-md text-white bg-gray-800 hover:bg-gray-800 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-gray-500"
                        >
                            Add New Task
                        </Link>
                    </div>
                </div>
            </div>
        </div>

        <!-- Incomplete Todos Section -->
        <div class="py-4">
            <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
                <div
                    class="overflow-hidden bg-white sm:rounded-lg border border-gray-300"
                >
                    <div class="p-6 bg-white text-black rounded-lg">
                        <h3 class="font-semibold text-lg">
                            Incomplete Todos ({{ incompleteTodos.length }})
                        </h3>
                        <ul class="mt-4 space-y-4">
                            <li
                                v-for="(todo, index) in incompleteTodos"
                                :key="todo.id"
                                class="flex justify-between items-center p-4 border border-gray-300 rounded-md hover:bg-gray-100 transition duration-200 ease-in-out"
                            >
                                <span class="text-black"
                                    >{{ index + 1 }}. {{ todo.title }}</span
                                >
                                <div>
                                    <Link
                                        :href="route('todo.show', todo.id)"
                                        class="px-4 mr-2 py-2 text-black bg-gray-200 border border-black rounded-md hover:bg-gray-300 focus:ring-2 focus:ring-offset-2 focus:ring-black"
                                    >
                                        Show
                                    </Link>
                                    <button
                                        @click="toggleCompletion(todo, true)"
                                        class="px-4 py-2 text-white bg-gray-800 rounded-md hover:bg-gray-700 focus:ring-2 focus:ring-offset-2 focus:ring-black"
                                    >
                                        Mark as Completed
                                    </button>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>

        <!-- Completed Todos Section -->
        <div class="py-4">
            <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
                <div
                    class="overflow-hidden bg-white sm:rounded-lg border border-gray-300"
                >
                    <div class="p-6 bg-white text-black rounded-lg">
                        <h3 class="font-semibold text-lg">
                            Completed Todos ({{ completedTodos.length }})
                        </h3>
                        <ul class="mt-4 space-y-4">
                            <li
                                v-for="(todo, index) in completedTodos"
                                :key="todo.id"
                                class="flex justify-between items-center p-4 border border-gray-300 rounded-md bg-gray-100 hover:bg-gray-200 transition duration-200 ease-in-out"
                            >
                                <span class="text-black"
                                    >{{ index + 1 }}. {{ todo.title }}</span
                                >
                                <div>
                                    <Link
                                        :href="route('todo.show', todo.id)"
                                        class="px-4 mr-2 py-2 text-black bg-gray-200 border border-black rounded-md hover:bg-gray-300 focus:ring-2 focus:ring-offset-2 focus:ring-black"
                                    >
                                        Show
                                    </Link>
                                    <button
                                        @click="toggleCompletion(todo, false)"
                                        class="px-4 py-2 text-black bg-gray-200 border border-black rounded-md hover:bg-gray-300 focus:ring-2 focus:ring-offset-2 focus:ring-black"
                                    >
                                        Mark as Incomplete
                                    </button>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </AuthenticatedLayout>
</template>
<script setup>
import { computed } from "vue";
import AuthenticatedLayout from "@/Layouts/AuthenticatedLayout.vue";
import { Head, usePage, Link } from "@inertiajs/vue3";

// Use `usePage` to directly access the data passed from the backend
const { props } = usePage();
const todos = props.todos;

// Filter incomplete and completed todos
const incompleteTodos = computed(() => {
    return todos.filter((todo) => !todo.completed);
});

const completedTodos = computed(() => {
    return todos.filter((todo) => todo.completed);
});

const toggleCompletion = (item, markComplete) => {
    const routePath = markComplete
        ? route("todo.complete", item.id)
        : route("todo.uncomplete", item.id);

    axios
        .patch(routePath)
        .then((response) => {
            // Check if the request was successful
            if (response.status === 200) {
                // Update the item's completion status
                item.completed = markComplete;
            }
        })
        .catch((error) => {
            console.error(error);
        });
};
</script>
