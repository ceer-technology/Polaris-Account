<script setup>
import CardTitle from './CardTitle.vue';
import Card from './Card.vue';
import CardLink from './CardLink.vue';
import CardIcon from './CardIcon.vue';
</script>

<template>
    <section class="text-gray-600">
        <CardTitle>
            <template #CardTitleText>
                {{ $t('Account settings') }}
            </template>
            
            <template #Cards>
                <CardLink :href="route('profile.information')" v-if="$page.props.jetstream.canUpdateProfileInformation">
                    <template #CardIconContent>
                        <CardIcon class="bg-gradient-to-br from-yellow-200 to-yellow-500">
                            <template #CardIcon>
                                <i class="fa-solid fa-user"></i>
                            </template>
                        </CardIcon>
                    </template>
                    <template #CardNameText>
                        {{ $t('Profile Information') }}
                    </template>
                </CardLink>

                <CardLink :href="route('profile.password')" v-if="$page.props.jetstream.canUpdatePassword">
                    <template #CardIconContent>
                        <CardIcon class="bg-gradient-to-br from-green-200 to-green-500">
                            <template #CardIcon>
                                <i class="fa-solid fa-lock"></i>
                            </template>
                        </CardIcon>
                    </template>
                    <template #CardNameText>
                        {{ $t('Update Password') }}
                    </template>
                </CardLink>

                <CardLink :href="route('profile.twoFactorAuthentication')" v-if="$page.props.jetstream.canManageTwoFactorAuthentication">
                    <template #CardIconContent>
                        <CardIcon class="bg-gradient-to-br from-blue-200 to-blue-500">
                            <template #CardIcon>
                                <i class="fa-solid fa-qrcode"></i>
                            </template>
                        </CardIcon>
                    </template>
                    <template #CardNameText>
                        {{ $t('Two Factor Authentication') }}
                    </template>
                </CardLink>

                <CardLink :href="route('profile.browserSessions')">
                    <template #CardIconContent>
                        <CardIcon class="bg-gradient-to-br from-gray-200 to-gray-500">
                            <template #CardIcon>
                                <i class="fa-solid fa-shoe-prints"></i>
                            </template>
                        </CardIcon>
                    </template>
                    <template #CardNameText>
                        {{ $t('Browser Sessions') }}
                    </template>
                </CardLink>

                <CardLink :href="route('profile.thirdPartyAccount')" v-if="$page.props.socialLoginsEnabled">
                    <template #CardIconContent>
                        <CardIcon class="bg-gradient-to-br from-purple-200 to-purple-500">
                            <template #CardIcon>
                                <i class="fa-solid fa-link"></i>
                            </template>
                        </CardIcon>
                    </template>
                    <template #CardNameText>
                        {{ $t('Third-party account') }}
                    </template>
                </CardLink>

                <CardLink :href="route('profile.deleteAccount')" v-if="$page.props.jetstream.hasAccountDeletionFeatures">
                    <template #CardIconContent>
                        <CardIcon class="bg-gradient-to-br from-red-200 to-red-500">
                            <template #CardIcon>
                                <i class="fa-solid fa-trash"></i>
                            </template>
                        </CardIcon>
                    </template>
                    <template #CardNameText>
                        {{ $t('Delete Account') }}
                    </template>
                </CardLink>
            </template>
        </CardTitle>

        <CardTitle>
            <template #CardTitleText>
                {{ $t('Help Center') }}
            </template>

            <template #Cards>
                <Card target="_blank" :href="$page.props.link.UserAgreement">
                    <template #CardIconContent>
                        <CardIcon class="bg-gradient-to-br from-blue-200 to-purple-500">
                            <template #CardIcon>
                                <i class="fa-solid fa-book-open-reader"></i>
                            </template>
                        </CardIcon>
                    </template>
                    <template #CardNameText>
                        {{ $t('User Agreement') }}
                    </template>
                </Card>

                <Card target="_blank" :href="$page.props.link.PrivacyPolicy">
                    <template #CardIconContent>
                        <CardIcon class="bg-gradient-to-br from-pink-200 to-red-500">
                            <template #CardIcon>
                                <i class="fa-solid fa-heart"></i>
                            </template>
                        </CardIcon>
                    </template>
                    <template #CardNameText>
                        {{ $t('Privacy Policy') }}
                    </template>
                </Card>

                <Card target="_blank" :href="$page.props.link.UserManual">
                    <template #CardIconContent>
                        <CardIcon class="bg-gradient-to-br from-red-500 to-red-700">
                            <template #CardIcon>
                                <i class="fa-solid fa-book"></i>
                            </template>
                        </CardIcon>
                    </template>
                    <template #CardNameText>
                        {{ $t('User Manual') }}
                    </template>
                </Card>

                <Card target="_blank" :href="$page.props.link.Feedback">
                    <template #CardIconContent>
                        <CardIcon class="bg-gradient-to-br from-pink-200 to-pink-500">
                            <template #CardIcon>
                                <i class="fa-solid fa-message"></i>
                            </template>
                        </CardIcon>
                    </template>
                    <template #CardNameText>
                        {{ $t('Feedback') }}
                    </template>
                </Card>

                <Card target="_blank" :href="$page.props.link.Service">
                    <template #CardIconContent>
                        <CardIcon class="bg-gradient-to-br from-yellow-400 to-yellow-600">
                            <template #CardIcon>
                                <i class="fa-solid fa-comments"></i>
                            </template>
                        </CardIcon>
                    </template>
                    <template #CardNameText>
                        {{ $t('Service') }}
                    </template>
                </Card>
            </template>
        </CardTitle>
    </section>
</template>
