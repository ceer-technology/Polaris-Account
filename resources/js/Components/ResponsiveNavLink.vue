<script setup>
import { computed } from 'vue';
import { Link } from '@inertiajs/vue3';

const props = defineProps({
    active: Boolean,
    href: String,
    as: String,
});

const classes = computed(() => {
    return props.active
        ? 'block pl-3 pr-4 py-2 border-l-4 border-yellow-200 text-base font-medium font-bold text-yellow-400 bg-yellow-50 focus:outline-none focus:text-yellow-500 focus:bg-yellow-100 focus:border-yellow-400 transition dark:border-yellow-900 dark:text-yellow-800 dark:bg-yellow-600 dark:focus:text-yellow-700 dark:focus:bg-yellow-500 focus:border-yellow-800'
        : 'block pl-3 pr-4 py-2 border-l-4 border-transparent text-base font-medium font-bold text-gray-600 hover:text-gray-800 hover:bg-gray-50 hover:bg-stone-100 border border-transparent focus:outline-none focus:text-gray-800 focus:bg-gray-50 focus:bg-stone-100 border border-transparent transition';
});
</script>

<template>
    <div>
        <button v-if="as == 'button'" :class="classes" class="w-full text-left">
            <slot />
        </button>

        <Link v-else :href="href" :class="classes">
            <slot />
        </Link>
    </div>
</template>
