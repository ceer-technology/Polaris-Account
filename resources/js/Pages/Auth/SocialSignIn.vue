<script setup>
import { Head, Link } from '@inertiajs/vue3';
import PrimaryButton from '@/Components/Buttons/PrimaryButton.vue';
import SecondaryButton from '@/Components/Buttons/SecondaryButton.vue';
</script>

<template>
    <Head :title="$t('auth.Sign In to your Polaris Account')" />
    <div class="px-8 mx-auto max-w-lg">
        <div class="mt-12 items-start justify-center rounded-xl border border-gray-100 p-4 shadow-xl sm:p-6 lg:p-8">
            <h1 class="text-lg font-bold text-red-500 sm:text-xl">
                {{ $t('auth.Sign In to your Polaris Account') }}
            </h1>
            <h3 class="mt-4 text-base font-bold text-gray-900 sm:text-xl">
                <strong>
                    {{ $t('auth.Sign in with') }}
                </strong>
            </h3>

            <div class="mt-16 flex flex-col items-center justify-between">
                <div class="bottom-12 w-full">
                    <!-- Create a Polaris Account - 创建新的北极星账户按钮 -->
                    <Link :href="route('auth.SocialwithRegister')">
                        <PrimaryButton class="w-full">
                            {{ $t('auth.Create a Polaris Account') }}
                        </PrimaryButton>
                    </Link>
                </div>

                <div class="mt-4 bottom-12 w-full">
                    <!-- Sign in to an existing Polaris Account - 关联到已有的北极星账户按钮 -->
                    <Link :href="route('auth.SocialwithLogin')">
                        <SecondaryButton class="w-full">
                            {{ $t('auth.Sign in to an existing Polaris Account') }}
                        </SecondaryButton>
                    </Link>
                </div>
            </div>
        </div>
    </div>
</template>