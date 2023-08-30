<script setup>
defineProps({
    SocialName: String,
});
</script>

<template>
    <div class="mt-2">
        <span class="text-base dark:text-white">
            <template v-if="SocialName">
                <slot name="SocialInformation" />
            </template>

            <template v-else>
                {{ $t('auth.Connected') }}
            </template>
        </span>
    </div>

    <div class="w-full absolute bottom-0">
        <slot name="SocialButton" />
    </div>
</template>