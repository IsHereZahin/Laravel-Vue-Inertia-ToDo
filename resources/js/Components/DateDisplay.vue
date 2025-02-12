<template>
    <span :class="formattedDateClass">{{ formattedDate }}</span>
</template>

<script setup>
import { computed } from "vue";

const props = defineProps({
    date: String, // date string
    completed: Boolean, // (true or false)
});

// Function to format the date
const formatDate = (dateString) => {
    const date = new Date(dateString);
    const today = new Date();

    // Format: 12 Jun, 2025
    const formattedDate = date.toLocaleDateString("en-US", {
        day: "2-digit",
        month: "short",
        year: "numeric",
    });

    // Remove time part for accurate date-only comparison
    today.setHours(0, 0, 0, 0);
    date.setHours(0, 0, 0, 0);

    // Check if it's today (considering day, month, and year)
    if (date.getTime() === today.getTime()) {
        return `${formattedDate} (Today)`;
    }

    // If it's overdue and not completed, show overdue
    if (date.getTime() < today.getTime() && !props.completed) {
        return `${formattedDate} (Overdue)`;
    }

    return formattedDate; // completed task, no overdue label
};

// Compute formatted date dynamically
const formattedDate = computed(() => formatDate(props.date));

// Compute the class based on the date and completion status
const formattedDateClass = computed(() => {
    const dateString = props.date;
    const date = new Date(dateString);
    const today = new Date();

    today.setHours(0, 0, 0, 0);
    date.setHours(0, 0, 0, 0);

    // If it's overdue and not completed
    if (date.getTime() < today.getTime() && !props.completed) {
        return "text-red-600";
    }

    // If it's today
    if (date.getTime() === today.getTime()) {
        return "text-amber-500";
    }

    return "text-gray-500"; // Default color
});
</script>
