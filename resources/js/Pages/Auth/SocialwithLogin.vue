<script setup>
import { Head } from '@inertiajs/vue3';
import LoginAuthenticationCard from '@/Components/Auth/LoginAuthenticationCard.vue';
import AuthPage from '@/Components/AuthTab/AuthPage.vue';
</script>

<template>
    <Head :title="$t('Log in')" />

    <LoginAuthenticationCard>
        <template #AuthTab>
            <AuthPage>
                {{ $t('Log in') }}
            </AuthPage>
        </template>
    </LoginAuthenticationCard>
</template>
