<script setup>
import { onMounted, ref, computed } from 'vue';

const props = defineProps({
    modelValue: String,
    active: Boolean,
});

defineEmits(['update:modelValue']);

const input = ref(null);

onMounted(() => {
    if (input.value.hasAttribute('autofocus')) {
        input.value.focus();
    }
});

defineExpose({ focus: () => input.value.focus() });

const classes = computed(() => {
    return props.active
        ? 'w-full bg-stone-100 border-2 border-transparent border-red-400 focus:border-red-400 focus:ring focus:ring-red-100 focus:ring-opacity-50 rounded-xl shadow-sm py-3 px-4 dark:bg-gray-500 dark:text-white dark:placeholder-gray-200'
        : 'w-full bg-stone-100 border-2 border-transparent focus:border-yellow-400 focus:ring focus:ring-yellow-100 focus:ring-opacity-50 rounded-xl shadow-sm py-3 px-4 dark:bg-gray-500 dark:text-white dark:placeholder-gray-200';
});
</script>

<template>
    <input
        ref="input"
        :class="classes"
        :value="modelValue"
        @input="$emit('update:modelValue', $event.target.value)"
    >
</template>
