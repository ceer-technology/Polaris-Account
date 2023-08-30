<script setup>
import { ref } from 'vue';
import { useForm } from '@inertiajs/vue3';
import ActionSection from '@/Components/ActionSection.vue';
import Icon from '@/Components/Icon.vue';
import DangerButton from '@/Components/Buttons/DangerButton.vue';
import DialogModal from '@/Components/DialogModal.vue';
import PasswordInput from '@/Components/PasswordInput.vue';
import InputError from '@/Components/InputError.vue';
import SecondaryButton from '@/Components/Buttons/SecondaryButton.vue';

const confirmingUserDeletion = ref(false);
const passwordInput = ref(null);

const form = useForm({
    password: '',
});

const confirmUserDeletion = () => {
    confirmingUserDeletion.value = true;

    setTimeout(() => passwordInput.value.focus(), 250);
};

const deleteUser = () => {
    form.delete(route('current-user.destroy'), {
        preserveScroll: true,
        onSuccess: () => closeModal(),
        onError: () => passwordInput.value.focus(),
        onFinish: () => form.reset(),
    });
};

const closeModal = () => {
    confirmingUserDeletion.value = false;

    form.reset();
};
</script>

<template>
    <ActionSection>
        <template #Icon>
            <Icon class="bg-gradient-to-br from-red-200 to-red-500">
                <template #icon>
                    <i class="fa-solid fa-trash"></i>
                </template>
            </Icon>
        </template>
        
        <template #title>
            {{ $t('Delete Account') }}
        </template>

        <template #description>
            {{ $t('Permanently delete your account.') }}
        </template>

        <template #content>
            <div class="max-w-xl text-sm text-gray-600 dark:text-white">
                {{ $t('Once your account is deleted, all of its resources and data will be permanently deleted. Before deleting your account, please download any data or information that you wish to retain.') }}
            </div>

            <div class="mt-5">
                <DangerButton @click="confirmUserDeletion">
                    {{ $t('Delete Account') }}
                </DangerButton>
            </div>

            <!-- Delete Account Confirmation Modal -->
            <DialogModal :show="confirmingUserDeletion" @close="closeModal">
                <template #title>
                    {{ $t('Delete Account') }}
                </template>

                <template #content>
                    {{ $t('Are you sure you want to delete your account? Once your account is deleted, all of its resources and data will be permanently deleted. Please enter your password to confirm you would like to permanently delete your account.') }}

                    <div class="mt-4">
                        <div
                            @keyup.enter="deleteUser"
                            class="mt-1 block w-full md:w-3/4"
                        >
                            <PasswordInput
                                refInput="passwordInput"
                                v-model:formValue="form.password"
                                :placeholderInput="$t('Password')"
                            />
                        </div>
                        <InputError :message="form.errors.password" class="mt-2" />
                    </div>
                </template>

                <template #footer>
                    <SecondaryButton @click="closeModal">
                        {{ $t('Cancel') }}
                    </SecondaryButton>

                    <DangerButton
                        class="ml-3"
                        :class="{ 'opacity-25': form.processing }"
                        :disabled="form.processing"
                        @click="deleteUser"
                    >
                        {{ $t('Delete Account') }}
                    </DangerButton>
                </template>
            </DialogModal>
        </template>
    </ActionSection>
</template>
