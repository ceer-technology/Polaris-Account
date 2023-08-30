<script setup>
import { nextTick, ref } from 'vue';
import { Head, useForm } from '@inertiajs/vue3';
import AuthenticationCard from '@/Components/AuthenticationCard.vue';
import AuthenticationCardLogo from '@/Components/AuthenticationCardLogo.vue';
import TwoFactorChallengeImage from '@/Components/Image/ImageTwoFactorChallenge.vue';
import Icon from '@/Components/Icon.vue';
import InputDiv from '@/Components/InputDiv.vue';
import InputError from '@/Components/InputError.vue';
import InputLabel from '@/Components/InputLabel.vue';
import PrimaryButton from '@/Components/Buttons/PrimaryButton.vue';
import TextInput from '@/Components/TextInput.vue';

const recovery = ref(false);

const form = useForm({
    code: '',
    recovery_code: '',
});

const recoveryCodeInput = ref(null);
const codeInput = ref(null);

const toggleRecovery = async () => {
    recovery.value ^= true;

    await nextTick();

    if (recovery.value) {
        recoveryCodeInput.value.focus();
        form.code = '';
    } else {
        codeInput.value.focus();
        form.recovery_code = '';
    }
};

const submit = () => {
    form.post(route('two-factor.login'));
};
</script>

<template>
    <Head :title="$t('Two Factor Authentication')" />

    <AuthenticationCard>
        <template #logo>
            <AuthenticationCardLogo />
        </template>

        <template #image>
            <TwoFactorChallengeImage />
        </template>

        <Icon class="mb-8 bg-gradient-to-br from-blue-200 to-blue-500">
            <template #icon>
                <i class="fa-solid fa-qrcode"></i>
            </template>
        </Icon>

        <div class="mb-4 text-sm text-gray-600 dark:text-white font-semibold">
            <template v-if="! recovery">
                {{ $t('Please confirm access to your account by entering the authentication code provided by your authenticator application.') }}
            </template>

            <template v-else>
                {{ $t('Please confirm access to your account by entering one of your emergency recovery codes.') }}
            </template>
        </div>

        <form @submit.prevent="submit">
            <div v-if="! recovery">
                <InputDiv class="mt-1 block w-full">
                    <InputLabel for="code" />
                    <TextInput
                        id="code"
                        ref="codeInput"
                        v-model="form.code"
                        type="text"
                        inputmode="numeric"
                        autofocus
                        autocomplete="one-time-code"
                        :placeholder="$t('Code')"
                    />
                </InputDiv>
                <InputError class="mt-2" :message="form.errors.code" />
            </div>

            <div v-else>
                <InputDiv class="mt-1 block w-full">
                    <InputLabel for="recovery_code" />
                    <TextInput
                        id="recovery_code"
                        ref="recoveryCodeInput"
                        v-model="form.recovery_code"
                        type="text"
                        autocomplete="one-time-code"
                        :placeholder="$t('Recovery Code')"
                    />
                </InputDiv>
                <InputError class="mt-2" :message="form.errors.recovery_code" />
            </div>

            <div class="flex items-center justify-end mt-4">
                <button type="button" class="text-sm text-gray-600 dark:text-white hover:text-yellow-500 cursor-pointer" @click.prevent="toggleRecovery">
                    <template v-if="! recovery">
                        {{ $t('Use a recovery code') }}
                    </template>

                    <template v-else>
                        {{ $t('Use an authentication code') }}
                    </template>
                </button>

                <PrimaryButton class="ml-4" :class="{ 'opacity-25': form.processing }" :disabled="form.processing">
                    {{ $t('Log in') }}
                </PrimaryButton>
            </div>
        </form>
    </AuthenticationCard>
</template>
