<script setup>
import { Head, Link } from '@inertiajs/vue3';
import PrimaryButton from '@/Components/Buttons/PrimaryButton.vue';
import SecondaryButton from '@/Components/Buttons/SecondaryButton.vue';
import RightIcon from '@/Components/Image/RightIcon.vue';
</script>

<template>
    <Head :title="$t('auth.Authorization Request')" />
    <div class="px-8 mx-auto max-w-lg">
        <div class="mt-16 flex items-center justify-between">
            <div class="bottom-12">
                <!-- Account information -->
                <p class="text-left text-base block">
                    <strong class="block font-medium">
                        {{ $t('Current Account') }}
                    </strong>
                    <span class="text-gray-500">
                        {{ $page.props.user.name }}
                    </span>
                </p>
            </div>

            <div class="bottom-12">
                <!-- Logou Button -->
                <Link :href="route('logout')" method="post">
                    {{ $t('Log Out') }}
                </Link>
            </div>
        </div>
        <div class="mt-12 items-start justify-center rounded-xl border border-gray-100 p-4 shadow-xl sm:p-6 lg:p-8">
            <h1 class="text-lg font-bold text-red-500 sm:text-xl">
                {{ $t('auth.Authorization Request') }}
            </h1>
            <h3 class="mt-4 text-base font-bold text-gray-900 sm:text-xl">
                <strong class="block">
                    {{ $t($page.props.client.name) }}
                </strong>
                <span>
                    {{ $t('auth.access your account') }}
                </span>
            </h3>

            <div>
                <p class="mt-8 font-bold text-base block">
                    <strong>{{ $t('auth.application able') }}</strong>
                </p>

                <ul>
                    <li class="mt-2 flex space-x-3">
                        <!-- Icon -->
                        <RightIcon />
                        <span class="text-base font-medium leading-tight text-gray-900">
                            {{ $t('auth.Must Use') }}
                        </span>
                    </li>
                    <li class="mt-2 flex space-x-3" v-if="$page.props.scopes.length > 0" v-for="scope in $page.props.scopes"
                        :key="scope">
                        <!-- Icon -->
                        <RightIcon />
                        <span class="text-base font-medium leading-tight text-gray-900">
                            {{ scope.description }}
                        </span>
                    </li>
                </ul>
            </div>

            <div class="mt-16 flex items-center justify-between">
                <div class="bottom-12">
                    <!-- Authorize Button - 同意按钮 -->
                    <form method="post" :action="$page.props.route.approve">
                        <input type="hidden" name="_token" :value="$page.props.csrfToken" />
                        <input type="hidden" name="state" :value="$page.props.request.state" />
                        <input type="hidden" name="client_id" :value="$page.props.client.id" />
                        <input type="hidden" name="auth_token" :value="$page.props.authToken" />
                        <PrimaryButton type="submit">
                            {{ $t('auth.Authorize') }}
                        </PrimaryButton>
                    </form>
                </div>

                <div class="bottom-12">
                    <!-- Cancel Button - 拒绝按钮 -->
                    <form method="post" :action="$page.props.route.deny">
                        <input type="hidden" name="_method" value="DELETE" />
                        <input type="hidden" name="_token" :value="$page.props.csrfToken" />
                        <input type="hidden" name="state" :value="$page.props.request.state" />
                        <input type="hidden" name="client_id" :value="$page.props.client.id" />
                        <input type="hidden" name="auth_token" :value="$page.props.authToken" />
                        <SecondaryButton type="submit">
                            {{ $t('auth.Cancel') }}
                        </SecondaryButton>
                    </form>
                </div>
            </div>
        </div>
    </div>
</template>