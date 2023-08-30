<script setup>
defineProps({
    type: {
        type: String,
        default: 'submit',
    },
});
</script>

<template>
    <button :type="type" class="items-center text-center px-4 py-3 bg-yellow-400 border border-transparent rounded-xl font-semibold text-base text-white tracking-widest enabled:hover:bg-yellow-300 enabled:active:bg-yellow-500 focus:outline-none focus:ring focus:ring-yellow-100 disabled:opacity-25 transition">
        <slot />
    </button>
</template>
