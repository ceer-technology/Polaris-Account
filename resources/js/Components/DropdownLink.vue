<script setup>
import { Link } from '@inertiajs/vue3';

defineProps({
    href: String,
    as: String,
});
</script>

<template>
    <div>
        <button v-if="as == 'button'" type="submit" class="block w-full px-4 py-3 text-sm leading-5 text-gray-700 text-left hover:bg-gray-100 focus:outline-none focus:bg-gray-100 transition dark:text-gray-50 dark:hover:bg-gray-400">
            <slot />
        </button>

        <a v-else-if="as =='a'" :href="href" class="block px-4 py-3 text-sm leading-5 text-gray-700 hover:bg-gray-100 focus:outline-none focus:bg-gray-100 transition dark:text-gray-50 dark:hover:bg-gray-400">
            <slot />
        </a>

        <Link v-else :href="href" class="block px-4 py-3 text-sm leading-5 text-gray-700 hover:bg-gray-100 focus:outline-none focus:bg-gray-100 transition dark:text-gray-50 dark:hover:bg-gray-400">
            <slot />
        </Link>
    </div>
</template>
