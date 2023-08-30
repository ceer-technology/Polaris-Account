<script setup>
import AuthTabButton from '@/Components/AuthTab/AuthTabButton.vue';
import AuthTabNavLink from '@/Components/AuthTab/AuthTabNavLink.vue';

defineProps({
    value: String,
});
</script>

<template>
    <div class="mb-8 text-xl">
        <AuthTabButton>
            <AuthTabNavLink :href="route('login')" :active="route().current('login')">
                    {{ $t('Log in') }}
            </AuthTabNavLink>
        </AuthTabButton>
        <AuthTabButton>
            <AuthTabNavLink :href="route('register')" :active="route().current('register')">
                    {{ $t('Register') }}
            </AuthTabNavLink>
        </AuthTabButton>
        <AuthTabButton v-if="value">
            <AuthTabNavLink :href="route('password.request')" :active="route().current('password.request')">
                    {{ $t('Forgot Password') }}
            </AuthTabNavLink>
        </AuthTabButton>
    </div>
</template>
