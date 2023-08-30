<script setup>
import AppLayout from '@/Layouts/AppLayout.vue';
import ThirdPartyAccountForm from '@/Pages/Profile/Partials/ThirdPartyAccountForm.vue';

defineProps({
    confirmsTwoFactorAuthentication: Boolean,
    sessions: Array,
});
</script>

<template>
    <AppLayout :title="$t('Third-party account')">
        <div>
            <div class="max-w-7xl mx-auto py-10 sm:px-6 lg:px-8">
                <div v-if="$page.props.socialLoginsEnabled">
                    <ThirdPartyAccountForm
                    />
                </div>
            </div>
        </div>
    </AppLayout>
</template>
