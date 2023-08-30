<script setup>
import { Head } from '@inertiajs/vue3';
import RegisterAuthenticationCard from '@/Components/Auth/RegisterAuthenticationCard.vue';
import AuthTab from '@/Components/AuthTab/AuthTab.vue';
import ResetPasswordButton from '@/Components/Auth/ResetPasswordButton.vue';
</script>

<template>
    <Head :title="$t('Register')" />

    <RegisterAuthenticationCard>
        <template #AuthTab>
                <AuthTab />
            </template>

            <template #ResetPassword>
                <div class="block mt-5 px-3 text-base">
                    <ResetPasswordButton class="text-center" />
                </div>
            </template>
    </RegisterAuthenticationCard>
</template>
