<script setup>
import { ref } from 'vue';
import { useForm } from '@inertiajs/vue3';
import ActionMessage from '@/Components/ActionMessage.vue';
import FormSection from '@/Components/FormSection.vue';
import Icon from '@/Components/Icon.vue';
import InputDiv from '@/Components/InputDiv.vue';
import PasswordInput from '@/Components/PasswordInput.vue';
import InputError from '@/Components/InputError.vue';
import InputLabel from '@/Components/InputLabel.vue';
import PrimaryButton from '@/Components/Buttons/PrimaryButton.vue';

const passwordInput = ref(null);
const currentPasswordInput = ref(null);

const form = useForm({
    current_password: '',
    password: '',
    password_confirmation: '',
});

const updatePassword = () => {
    form.put(route('user-password.update'), {
        errorBag: 'updatePassword',
        preserveScroll: true,
        onSuccess: () => form.reset(),
        onError: () => {
            if (form.errors.password) {
                form.reset('password', 'password_confirmation');
                passwordInput.value.focus();
            }

            if (form.errors.current_password) {
                form.reset('current_password');
                currentPasswordInput.value.focus();
            }
        },
    });
};
</script>

<template>
    <FormSection @submitted="updatePassword">
        <template #Icon>
            <Icon class="bg-gradient-to-br from-green-200 to-green-500">
                <template #icon>
                    <i class="fa-solid fa-lock"></i>
                </template>
            </Icon>
        </template>

        <template #title>
            {{ $t('Update Password') }}
        </template>

        <template #description>
            {{ $t('Ensure your account is using a long, random password to stay secure.') }}
        </template>

        <template #form>
            <div class="col-span-6 sm:col-span-4">
                <InputDiv class="mt-1 block w-full">
                    <InputLabel for="current_password" />
                    <PasswordInput
                        Inputid="current_password"
                        refInput="currentPasswordInput"
                        v-model:formValue="form.current_password"
                        autocompleteInput="current-password"
                        :placeholderInput="$t('Current Password')"
                    />
                </InputDiv>
                <InputError :message="form.errors.current_password" class="mt-2" />
            </div>

            <div class="col-span-6 sm:col-span-4">
                <div class="mt-1 block w-full">
                    <InputLabel for="password" />
                    <PasswordInput
                        Inputid="password"
                        refInput="passwordInput"
                        v-model:formValue="form.password"
                        autocompleteInput="new-password"
                        :placeholderInput="$t('New Password')"
                        createOrUpdate="true"
                    />
                </div>
                <InputError :message="form.errors.password" class="mt-2" />
            </div>

            <div class="col-span-6 sm:col-span-4">
                <div class="mt-1 block w-full">
                    <InputLabel for="password_confirmation" />
                    <PasswordInput
                        Inputid="password_confirmation"
                        v-model:formValue="form.password_confirmation"
                        autocompleteInput="new-password"
                        :placeholderInput="$t('Confirm Password')"
                    />
                </div>
                <InputError :message="form.errors.password_confirmation" class="mt-2" />
            </div>
        </template>

        <template #actions>
            <ActionMessage :on="form.recentlySuccessful" class="mr-3">
                {{ $t('Saved.') }}
            </ActionMessage>

            <PrimaryButton :class="{ 'opacity-25': form.processing }" :disabled="form.processing">
                {{ $t('Save') }}
            </PrimaryButton>
        </template>
    </FormSection>
</template>
