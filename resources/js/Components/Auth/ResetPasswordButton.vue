<script setup>
import { Link } from '@inertiajs/vue3';
</script>

<template>
    <div id="ResetPassword">
        <Link v-if="$page.props.canResetPassword" :href="route('password.request')"
            class="text-yellow-400 hover:text-yellow-500 font-bold">
            {{ $t('Forgot your password?') }}
        </Link>
    </div>
</template>
