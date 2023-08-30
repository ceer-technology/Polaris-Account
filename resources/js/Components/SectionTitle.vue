<template>
    <div class="md:col-span-1 flex justify-between">
        <div class="px-4 sm:px-0 w-1/2">
            <slot name="Icon" />
        </div>

        <div class="px-4 sm:px-0 w-1/2">
            <h3 class="text-lg font-bold text-yellow-500">
                <slot name="title" />
            </h3>

            <p class="mt-1 text-sm text-gray-600 dark:text-white dark:text-gray-100">
                <slot name="description" />
            </p>
        </div>
    </div>
</template>
