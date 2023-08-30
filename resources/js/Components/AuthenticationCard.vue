<script setup>
import TipCards from '@/Components/Tip/TipCards.vue';
</script>

<template>
    <div class="min-h-screen flex flex-col sm:justify-center items-center pt-6 sm:pt-0 bg-white dark:bg-gray-800">
        <TipCards />
        
        <div class="py-8">
            <slot name="logo" />
        </div>

        <div class="lg:flex lg:w-[56rem] sm:w-[32rem] lg:h-[36rem] w-full mt-6 sm:shadow-lg sm:rounded-xl overflow-hidden dark:sm:bg-gray-700">
            <div class="lg:flex w-1/2 hidden pr-3">
                <slot name="image" />
            </div>
            <div class="relative lg:w-1/2 px-3">
                <div class="w-full p-8 sm:p-12">
                    <slot />
                </div>
            </div>
        </div>
    </div>
</template>
