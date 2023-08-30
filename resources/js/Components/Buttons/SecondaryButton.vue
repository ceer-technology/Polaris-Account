<script setup>
defineProps({
    type: {
        type: String,
        default: 'button',
    },
});
</script>

<template>
    <button :type="type" class="items-center text-center px-4 py-3 border bg-stone-300 border-transparent rounded-xl font-semibold text-base text-gray-700 tracking-widest shadow-sm hover:text-gray-500 focus:outline-none focus:border-stone-300 focus:ring focus:ring-stone-200 active:text-gray-800 active:bg-gray-50 disabled:opacity-25 transition">
        <slot />
    </button>
</template>
