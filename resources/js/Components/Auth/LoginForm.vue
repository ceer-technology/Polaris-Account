<script setup>
import { useForm } from '@inertiajs/vue3';
import Checkbox from '@/Components/Checkbox.vue';
import InputDiv from '@/Components/InputDiv.vue';
import InputError from '@/Components/InputError.vue';
import InputLabel from '@/Components/InputLabel.vue';
import PrimaryButton from '@/Components/Buttons/PrimaryButton.vue';
import TextInput from '@/Components/TextInput.vue';
import TextInputIcon from '@/Components/TextInputIcon.vue';
import SocialiteLogins from '@/Components/Social/SocialiteLogins.vue';
import PasswordInput from '@/Components/PasswordInput.vue';

defineProps({
    status: String,
});

const form = useForm({
    email: '',
    password: '',
    remember: false,
    terms: false,
});

const submit = () => {
    form.transform(data => ({
        ...data,
        remember: form.remember ? 'on' : '',
    })).post(route('login'), {
        onFinish: () => form.reset('password'),
    });
};
</script>

<template>
    <form @submit.prevent="submit">
        <slot name="AuthTab" />
        <div>
            <InputDiv class="mt-1 block w-full">
                <InputLabel for="email" />
                <TextInput
                    id="email"
                    v-model="form.email"
                    type="text"
                    required
                    autofocus
                    :placeholder="$t('Username/Email')"
                    :active="form.errors.email"
                />
                <TextInputIcon :active="form.errors.email" />
            </InputDiv>
            <InputError class="mt-2" :message="form.errors.email" />
        </div>

        <div v-if="status" class="mt-2 text-sm text-green-600 font-bold">
            {{ status }}
        </div>

        <div class="mt-4">
            <div class="mt-1 block w-full">
                <InputLabel for="password" />
                <PasswordInput
                    InputId="password"
                    v-model:formValue="form.password"
                    autocompleteInput="current-password"
                    :placeholderInput="$t('Password')"
                    :activeInput="form.errors.password"
                />
            </div>
            <InputError class="mt-2" :message="form.errors.password" />
        </div>

        <div class="block mt-5 px-3 text-base">
            <div class="flex">
                <label class="flex items-center w-1/2">
                    <Checkbox v-model:checked="form.remember" name="remember" />
                    <span class="ml-2 text-gray-500 dark:text-white">{{ $t('Remember me') }}</span>
                </label>
                <slot name="ResetPassword" />
            </div>
        </div>

        <div class="items-center justify-end mt-4">
            <PrimaryButton class="w-full" >
                {{ $t('Log in') }}
            </PrimaryButton>
        </div>

        <div v-if="$page.props.socialLoginsEnabled" v-show="route().current('login')" class="mt-5">
            <p class="mx-4 mb-0 text-center font-semibold text-gray-500 dark:text-white">
                {{ $t('More login options') }}
            </p>
            <SocialiteLogins />
        </div>
    </form>
</template>
