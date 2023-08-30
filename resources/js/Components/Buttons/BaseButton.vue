<script setup>
defineProps({
    type: {
        type: String,
        default: 'submit',
    },
});
</script>

<template>
    <button :type="type" class="items-center text-center px-4 py-3 text-gray-900 border border-gray-200 rounded-xl font-semibold text-base uppercase tracking-widest hover:bg-gray-100 focus:ring-4 focus:ring-gray-100 dark:text-white dark:border-gray-700 dark:hover:bg-gray-700 dark:focus:ring-gray-800 disabled:opacity-25 transition">
        <slot />
    </button>
</template>
