<script setup>
</script>

<template>
    <section class="bg-white dark:bg-gray-900">
        <div class="grid max-w-screen-xl px-4 pt-20 pb-8 mx-auto lg:gap-8 xl:gap-0 lg:py-16 lg:grid-cols-12 lg:pt-28">
            <div class="mr-auto place-self-center lg:col-span-7">
                <h1 class="max-w-2xl mb-4 text-4xl font-extrabold leading-none tracking-tight md:text-5xl xl:text-6xl dark:text-white">
                    {{ $t('One account') }}<br>
                    {{ $t('passes through all services of Polaris Account') }}
                </h1>
                <p class="max-w-2xl mb-6 font-light text-gray-500 lg:mb-8 md:text-lg lg:text-xl dark:text-gray-400">
                    {{ $t('Access Polaris Account services with a single login, easy setup of account information, security settings, and more. a username and password that connects you to the services and content you care about and love.') }}
                </p>
                <div class="space-x-4 flex">
                    <slot />
                </div>
            </div>
        </div>
    </section>
</template>
