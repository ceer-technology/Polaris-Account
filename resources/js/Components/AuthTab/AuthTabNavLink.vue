<script setup>
import { computed } from 'vue';
import { Link } from '@inertiajs/vue3';

const props = defineProps({
    active: Boolean,
    href: String,
});

const classes = computed(() => {
    return props.active
        ? 'text-zinc-900 font-bold dark:text-white'
        : 'text-zinc-400 font-bold dark:text-gray-400';
});
</script>

<template>
    <div>
        <Link :href="href" :class="classes">
            <slot />
        </Link>
    </div>
</template>
