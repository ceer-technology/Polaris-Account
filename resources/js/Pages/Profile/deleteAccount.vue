<script setup>
import AppLayout from '@/Layouts/AppLayout.vue';
import DeleteUserForm from '@/Pages/Profile/Partials/DeleteUserForm.vue';

defineProps({
    confirmsTwoFactorAuthentication: Boolean,
    sessions: Array,
});
</script>

<template>
    <AppLayout :title="$t('Delete Account')">
        <div>
            <div class="max-w-7xl mx-auto py-10 sm:px-6 lg:px-8">
                <template v-if="$page.props.jetstream.hasAccountDeletionFeatures">
                    <DeleteUserForm />
                </template>
            </div>
        </div>
    </AppLayout>
</template>
