<script setup>
import { computed } from 'vue';

const props = defineProps({
    active: Boolean,
});

const classes = computed(() => {
    return props.active
        ? 'w-5 absolute inset-y-0 right-4 inline-flex items-center'
        : 'hidden';
});
</script>

<template>
    <div :class="classes">
        <span class="w-full text-center text-red-400">
            <i class="fa-solid fa-circle-exclamation" />
        </span>
    </div>
</template>
