<template>
    <div
        class="w-48 h-64 text-center rounded-xl border border-gray-100 p-4 shadow-sm transition sm:p-6 dark:border-gray-700 dark:bg-gray-800">
        <div class="relative h-full">
            <slot name="CardLogo" />

            <div class="mt-4">
                <h2 class="text-xl font-bold text-gray-500 dark:text-white">
                    <slot name="CardNameText" />
                </h2>
            </div>

            <slot name="SocialContent" />
        </div>
    </div>
</template>