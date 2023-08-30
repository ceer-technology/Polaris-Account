<script setup>
import { Head } from '@inertiajs/vue3';
import RegisterAuthenticationCard from '@/Components/Auth/RegisterAuthenticationCard.vue';
import AuthPage from '@/Components/AuthTab/AuthPage.vue';
</script>

<template>
    <Head :title="$t('Register')" />

    <RegisterAuthenticationCard>
        <template #AuthTab>
            <AuthPage>
                {{ $t('Register') }}
            </AuthPage>
        </template>
    </RegisterAuthenticationCard>
</template>
