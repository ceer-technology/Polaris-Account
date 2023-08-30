<script setup>
import AppLayout from '@/Layouts/AppLayout.vue';
import HomeWelcome from '@/Components/Home/HomeWelcome.vue';
</script>

<template>
    <AppLayout :title="$t('Manage Account')">
        <div class="sm:py-6 lg:py-8">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="overflow-hidden sm:rounded-lg">
                    <HomeWelcome />
                </div>
            </div>
        </div>
    </AppLayout>
</template>
