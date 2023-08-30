<script setup>
import { Head, useForm } from '@inertiajs/vue3';
import AuthenticationCard from '@/Components/AuthenticationCard.vue';
import AuthenticationCardLogo from '@/Components/AuthenticationCardLogo.vue';
import ForgotPasswordImage from '@/Components/Image/ImageForgotPassword.vue';
import InputDiv from '@/Components/InputDiv.vue';
import InputError from '@/Components/InputError.vue';
import InputLabel from '@/Components/InputLabel.vue';
import PrimaryButton from '@/Components/Buttons/PrimaryButton.vue';
import TextInput from '@/Components/TextInput.vue';
import AuthTab  from '@/Components/AuthTab/AuthTab.vue';

defineProps({
    status: String,
});

const form = useForm({
    email: '',
});

const submit = () => {
    form.post(route('password.email'));
};
</script>

<template>
    <Head :title="$t('Forgot Password')" />

    <AuthenticationCard>
        <template #logo>
            <AuthenticationCardLogo />
        </template>

        <template #image>
            <ForgotPasswordImage />
        </template>

        <form @submit.prevent="submit">
            <AuthTab value="true"/>
            <div>
                <InputDiv class="mt-1 block w-full">
                    <InputLabel for="email" />
                    <TextInput
                        id="email"
                        v-model="form.email"
                        type="email"
                        required
                        autofocus
                        :placeholder="$t('Email')"
                    />
                </InputDiv>
                <InputError class="mt-2" :message="form.errors.email" />
            </div>

            <div v-if="status" class="mt-2 text-sm text-green-600 font-bold">
                {{ status }}
            </div>

            <div class="flex items-center justify-end mt-4">
                <PrimaryButton class="w-full" :class="{ 'opacity-25': form.processing }" :disabled="form.processing">
                    {{ $t('Email Password Reset Link') }}
                </PrimaryButton>
            </div>
        </form>
    </AuthenticationCard>
</template>
