<template>
    <span :class="formattedDateClass">{{ formattedDate }}</span>
</template>

<script setup>
import { computed } from "vue";

const props = defineProps({
    date: String, // Accepts a date string
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

    // Check if it's today
    if (date.getTime() === today.getTime()) {
        return `${formattedDate} (Today)`;
    }

    // Check if it's over (past date)
    if (date.getTime() < today.getTime()) {
        return `${formattedDate} (Overdue)`;
    }

    return formattedDate; // Future date
};

// Compute formatted date dynamically
const formattedDate = computed(() => formatDate(props.date));

// Compute the class based on the date
const formattedDateClass = computed(() => {
    const dateString = props.date;
    const date = new Date(dateString);
    const today = new Date();

    today.setHours(0, 0, 0, 0);
    date.setHours(0, 0, 0, 0);

    if (date.getTime() === today.getTime()) {
        return "text-black";
    }

    if (date.getTime() < today.getTime()) {
        return "text-red-600";
    }

    return "";
});
</script>
