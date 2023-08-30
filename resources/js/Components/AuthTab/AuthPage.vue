<script setup>
import AuthTabButton from '@/Components/AuthTab/AuthTabButton.vue';
</script>

<template>
    <div class="mb-8 text-xl">
        <AuthTabButton>
            <div class="text-zinc-900 font-bold dark:text-white">
                <slot />
            </div>
        </AuthTabButton>
    </div>
</template>
