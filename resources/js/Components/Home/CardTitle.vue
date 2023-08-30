<template>
    <div class="mx-auto max-w-screen-xl px-6 py-16 sm:px-6 lg:px-8">
        <div class="mx-auto max-w-lg text-center">
            <h2 class="text-3xl font-bold sm:text-4xl dark:text-white">
                <slot name="CardTitleText" />
            </h2>
        </div>

        <div class="place-items-center sm:place-items-stretch mt-8 grid grid-cols-1 gap-8 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4">
            <slot name="Cards" />
        </div>   
    </div>
</template>
