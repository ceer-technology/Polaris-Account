<script setup>
import { computed } from 'vue';
import { Link } from '@inertiajs/vue3';

const props = defineProps({
    href: String,
    active: Boolean,
});

const classes = computed(() => {
    return props.active
        ? 'inline-flex items-center px-1 pt-1 border-b-2 border-yellow-200 text-sm font-bold leading-5 text-yellow-500 focus:outline-none focus:border-yellow-400 transition'
        : 'inline-flex items-center px-1 pt-1 border-b-2 border-transparent text-sm font-bold leading-5 text-gray-500 hover:text-gray-700 hover:bg-stone-100 border border-transparent focus:outline-none focus:text-gray-700 focus:bg-stone-100 border border-transparent transition dark:text-gray-200 dark:hover:bg-gray-400';
});
</script>

<template>
    <Link :href="href" :class="classes">
        <slot />
    </Link>
</template>
