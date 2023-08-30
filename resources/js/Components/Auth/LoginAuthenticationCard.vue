<script setup>
import AuthenticationCard from '@/Components/AuthenticationCard.vue';
import AuthenticationCardLogo from '@/Components/AuthenticationCardLogo.vue';
import LoginImage from '@/Components/Image/ImageLogin.vue';
import LoginForm from './LoginForm.vue';
</script>

<template>
    <AuthenticationCard>
        <template #logo>
            <AuthenticationCardLogo />
        </template>

        <template #image>
            <LoginImage />
        </template>

        <LoginForm>
            <template #AuthTab>
                <slot name="AuthTab" />
            </template>

            <template #ResetPassword>
                <slot name="ResetPassword" />
            </template>
        </LoginForm>
    </AuthenticationCard>
</template>
