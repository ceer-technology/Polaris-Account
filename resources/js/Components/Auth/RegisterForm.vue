<script setup>
import { useForm , usePage } from '@inertiajs/vue3';
import Checkbox from '@/Components/Checkbox.vue';
import InputDiv from '@/Components/InputDiv.vue';
import InputError from '@/Components/InputError.vue';
import InputLabel from '@/Components/InputLabel.vue';
import TermsAndPrivacyPolicy from './TermsAndPrivacyPolicy.vue';
import PrimaryButton from '@/Components/Buttons/PrimaryButton.vue';
import TextInput from '@/Components/TextInput.vue';
import TextInputIcon from '@/Components/TextInputIcon.vue';
import PasswordInput from '@/Components/PasswordInput.vue';

const props = defineProps({
    status: String,
    active: Boolean,
});

const { props: pageProps } = usePage()
const { provider_username, provider_email } = pageProps // 解构赋值

const form = useForm({
    name: pageProps.provider_username,
    email: pageProps.provider_email,
    password: '',
    password_confirmation: '',
    terms: false,
});

const submit = () => {
    form.post(route('register'), {
        onFinish: () => form.reset("$t('password')", "$t('password_confirmation')"),
    });
};
</script>

<template>
    <form @submit.prevent="submit">
        <slot name="AuthTab" />
        <div>
            <InputDiv class="mt-1 block w-full">
                <InputLabel for="name" />
                <TextInput
                    id="name"
                    v-model="form.name"
                    type="text"
                    required
                    autofocus
                    autocomplete="name"
                    :placeholder="$t('Name')"
                    :active="form.errors.name" />
                <TextInputIcon :active="form.errors.name" />
            </InputDiv>
            <InputError class="mt-2" :message="form.errors.name" />
        </div>

        <div class="mt-4">
            <InputDiv class="mt-1 block w-full">
                <InputLabel for="email" />
                <TextInput
                    id="email"
                    v-model="form.email"
                    type="email"
                    required
                    :placeholder="$t('Email')"
                    :active="form.errors.email" />
                <TextInputIcon :active="form.errors.email" />
            </InputDiv>
            <InputError class="mt-2" :message="form.errors.email" />
        </div>

        <div class="mt-4">
            <div class="mt-1 block w-full">
                <InputLabel for="password" />
                <PasswordInput
                    Inputid="password"
                    v-model:formValue="form.password"
                    autocompleteInput="new-password"
                    :placeholderInput="$t('Password')"
                    :activeInput="form.errors.password"
                    createOrUpdate="true"
                />
            </div>
            <InputError class="mt-2" :message="form.errors.password" />
        </div>

        <div class="mt-4">
            <div class="mt-1 block w-full">
                <InputLabel for="password_confirmation" />
                <PasswordInput
                    idInput="password_confirmation"
                    v-model:formValue="form.password_confirmation"
                    autocompleteInput="new-password"
                    :placeholderInput="$t('Confirm Password')"
                    :activeInput="form.errors.password_confirmation"
                />
            </div>
            <InputError class="mt-2" :message="form.errors.password_confirmation" />
        </div>

        <TermsAndPrivacyPolicy>
            <template #Checkbox>
                <Checkbox id="terms" v-model:checked="form.terms" name="terms" required />
            </template>

            <template #InputError>
                <InputError class="mt-2" :message="form.errors.terms" />
            </template>
        </TermsAndPrivacyPolicy>

        <div class="items-center justify-end mt-4">
            <PrimaryButton class="w-full" :class="{ 'opacity-25': !form.terms }" :disabled="!form.terms">
                {{ $t('Register') }}
            </PrimaryButton>
        </div>

        <slot name="ResetPassword" />
    </form>
</template>
