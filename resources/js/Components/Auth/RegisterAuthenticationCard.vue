<script setup>
import AuthenticationCard from '@/Components/AuthenticationCard.vue';
import AuthenticationCardLogo from '@/Components/AuthenticationCardLogo.vue';
import RegisterImage from '@/Components/Image/ImageRegister.vue';
import RegisterForm from './RegisterForm.vue';
</script>

<template>
    <AuthenticationCard>
        <template #logo>
            <AuthenticationCardLogo />
        </template>

        <template #image>
            <RegisterImage />
        </template>

        <RegisterForm>
            <template #AuthTab>
                <slot name="AuthTab" />
            </template>

            <template #ResetPassword>
                <slot name="ResetPassword" />
            </template>
        </RegisterForm>
    </AuthenticationCard>
</template>
