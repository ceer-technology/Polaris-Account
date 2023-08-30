<script setup>
import InputLabel from '@/Components/InputLabel.vue';
</script>

<template>
    <div v-if="$page.props.jetstream.hasTermsAndPrivacyPolicyFeature" class="mt-4 px-3">
        <div class="flex">
            <InputLabel for="terms">
                <div class="flex items-center">
                    <slot name="Checkbox" />

                    <div class="ml-2 text-gray-400">
                        {{ $t('I have read and agree to the') }}
                        <a target="_blank"
                            :href="$page.props.link.UserAgreement"
                            class="text-gray-600 dark:text-white hover:text-yellow-500">
                            {{ $t('User Agreement') }}
                        </a>
                        {{ $t('and') }}
                        <a target="_blank"
                            :href="$page.props.link.PrivacyPolicy"
                            class="text-gray-600 dark:text-white hover:text-yellow-500">
                            {{ $t('Privacy Policy') }}
                        </a>
                    </div>
                </div>
                <slot name="InputError" />
            </InputLabel>
        </div>
    </div>
</template>
