<script setup>
import { Head } from '@inertiajs/vue3';
import LoginAuthenticationCard from '@/Components/Auth/LoginAuthenticationCard.vue';
import AuthTab from '@/Components/AuthTab/AuthTab.vue';
import ResetPasswordButton from '@/Components/Auth/ResetPasswordButton.vue';
</script>

<template>
    <Head :title="$t('Log in')" />

    <LoginAuthenticationCard>
        <template #AuthTab>
            <AuthTab />
        </template>

        <template #ResetPassword>
            <ResetPasswordButton class="w-1/2 text-right" />
        </template>
    </LoginAuthenticationCard>
</template>
