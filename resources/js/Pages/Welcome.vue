<script setup>
import { Head, Link } from '@inertiajs/vue3';
import WelcomeHeader from '@/Components/Welcome/WelcomeHeader.vue';
import WelcomeHeroWrapper from '@/Components/Welcome/WelcomeHeroWrapper.vue';
import WelcomeFooter from '@/Components/Welcome/WelcomeFooter.vue';
import PrimaryButton from '@/Components/Buttons/PrimaryButton.vue';
import BaseButton from '@/Components/Buttons/BaseButton.vue';

defineProps({
    canLogin: Boolean,
    canRegister: Boolean,
    laravelVersion: String,
    phpVersion: String,
});
</script>

<template>
    <Head :title="$t('Introducing')" />

    <WelcomeHeader v-if="canLogin">
        <Link v-if="$page.props.user" :href="route('home')" class="text-base font-bold text-gray-700 dark:text-white">
            {{ $t('Manage Account') }}
        </Link>

        <template v-else>
            <Link :href="route('login')" class="mr-4 text-base font-bold text-gray-700 dark:text-white">
                {{ $t('Log in') }}
            </Link>

            <Link v-if="canRegister" :href="route('register')">
                <PrimaryButton>
                    {{ $t('Register') }}
                </PrimaryButton> 
            </Link>
        </template>
    </WelcomeHeader>
    <WelcomeHeroWrapper v-if="canLogin">
        <Link v-if="$page.props.user" :href="route('home')">
            <BaseButton class="w-full sm:w-auto">
                {{ $t('Manage Account') }}
            </BaseButton>
        </Link>

        <template v-else>
            <Link :href="route('login')">
                <BaseButton>
                    {{ $t('Log in') }}
                </BaseButton>
            </Link>

            <Link v-if="canRegister" :href="route('register')">
                <PrimaryButton>
                    {{ $t('Register') }}
                </PrimaryButton> 
            </Link>
        </template>
    </WelcomeHeroWrapper>
    <WelcomeFooter />
</template>
