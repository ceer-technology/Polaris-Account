<template>
    <a class="w-80 sm:w-auto max-w-xs flex rounded-xl border border-gray-100 p-4 shadow-sm transition hover:shadow-md sm:p-6 dark:border-gray-700">

        <slot name="CardIconContent" />
        
        <h2 class="flex items-center w-1/2 text-xl font-bold text-gray-500 dark:text-white">
            <slot name="CardNameText" />
        </h2>
    </a>
</template>
