<script setup>
import { computed } from 'vue';
import { Head, Link, useForm } from '@inertiajs/vue3';
import AuthenticationCard from '@/Components/AuthenticationCard.vue';
import AuthenticationCardLogo from '@/Components/AuthenticationCardLogo.vue';
import Icon from '@/Components/Icon.vue';
import VerifyEmailImage from '@/Components/Image/ImageVerifyEmail.vue';
import PrimaryButton from '@/Components/Buttons/PrimaryButton.vue';
import SecondaryButton from '@/Components/Buttons/SecondaryButton.vue';
import DangerButton from '@/Components/Buttons/DangerButton.vue';

const props = defineProps({
    status: String,
});

const form = useForm({});

const submit = () => {
    form.post(route('verification.send'));
};

const verificationLinkSent = computed(() => props.status === 'verification-link-sent');
</script>

<template>
    <Head :title="$t('Email Verification')" />

    <AuthenticationCard>
        <template #logo>
            <AuthenticationCardLogo />
        </template>

        <template #image>
            <VerifyEmailImage />
        </template>

        <Icon class="mb-8 bg-gradient-to-r from-red-600 to-yellow-400">
            <template #icon>
                <i class="fa-solid fa-triangle-exclamation"></i>
            </template>
        </Icon>

        <div class="mb-4 text-sm text-gray-600 dark:text-white font-semibold">
            {{ $t("Before continuing, could you verify your email address by clicking on the link we just emailed to you? If you didn't receive the email, we will gladly send you another.") }}
        </div>

        <div v-if="verificationLinkSent" class="mb-4 font-medium text-sm text-green-600">
            {{ $t('A new verification link has been sent to the email address you provided in your profile settings.') }}
        </div>

        <form @submit.prevent="submit">
            <div class="mt-4 items-center justify-between">
                <PrimaryButton class="w-full" :class="{ 'opacity-25': form.processing }" :disabled="form.processing">
                    {{ $t('Resend Verification Email') }}
                </PrimaryButton>
            </div>
            <div class="lg:mt-48 mt-24 flex items-center justify-between">
                <Link :href="route('profile.information')">
                    <SecondaryButton class="bottom-12">
                        {{ $t('Edit Profile') }}
                    </SecondaryButton>
                </Link>
                
                <Link 
                    :href="route('logout')"
                    method="post"
                >
                    <DangerButton class="bottom-12">
                        {{ $t('Log Out') }}
                    </DangerButton>
                </Link>
            </div>
        </form>
    </AuthenticationCard>
</template>
