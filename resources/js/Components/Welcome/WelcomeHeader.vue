<script setup>
import { Link } from '@inertiajs/vue3';
import ApplicationMark from '@/Components/ApplicationMark.vue';
</script>

<template>
    <header class="fixed w-full">
        <nav class="bg-white border-gray-200 py-2.5 dark:bg-gray-900">
            <div class="flex flex-wrap items-center justify-between max-w-screen-xl px-4 mx-auto">
                <Link :href="route('home')" class="flex items-center">
                    <ApplicationMark class="h-6 mr-3 sm:h-9" alt="Logo" />
                    <span class="self-center text-xl font-semibold whitespace-nowrap dark:text-white">
                        {{ $t('Polaris Account') }}
                    </span>
                </Link>
                <div class="flex items-center lg:order-2">
                    <slot />
                </div>
            </div>
        </nav>
    </header>
</template>
