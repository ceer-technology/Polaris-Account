<script setup>
import { ref } from 'vue';
import { Head, useForm } from '@inertiajs/vue3';
import AuthenticationCard from '@/Components/AuthenticationCard.vue';
import AuthenticationCardLogo from '@/Components/AuthenticationCardLogo.vue';
import ConfirmPasswordImage from '@/Components/Image/ImageConfirmPassword.vue';
import PasswordInput from '@/Components/PasswordInput.vue';
import InputError from '@/Components/InputError.vue';
import InputLabel from '@/Components/InputLabel.vue';
import PrimaryButton from '@/Components/Buttons/PrimaryButton.vue';

const form = useForm({
    password: '',
});

const passwordInput = ref(null);

const submit = () => {
    form.post(route('password.confirm'), {
        onFinish: () => {
            form.reset();

            passwordInput.value.focus();
        },
    });
};
</script>

<template>
    <Head title="Secure Area" />

    <AuthenticationCard>
        <template #logo>
            <AuthenticationCardLogo />
        </template>

        <template #image>
            <ConfirmPasswordImage />
        </template>

        <div class="mb-4 text-sm text-gray-600 dark:text-white">
            {{ $t('This is a secure area of the application. Please confirm your password before continuing.') }}
        </div>

        <form @submit.prevent="submit">
            <div>
                <div class="mt-1 block w-full">
                    <InputLabel for="password" />
                    <PasswordInput
                        Inputid="password"
                        refInput="passwordInput"
                        v-model:formValue="form.password"
                        autocompleteInput="current-password"
                        :placeholderInput="$t('Password')"
                        :activeInput="form.errors.password"
                    />
                </div>
                <InputError class="mt-2" :message="form.errors.password" />
            </div>

            <div class="flex justify-end mt-4">
                <PrimaryButton class="ml-4" :class="{ 'opacity-25': form.processing }" :disabled="form.processing">
                    {{ $t('Confirm') }}
                </PrimaryButton>
            </div>
        </form>
    </AuthenticationCard>
</template>
