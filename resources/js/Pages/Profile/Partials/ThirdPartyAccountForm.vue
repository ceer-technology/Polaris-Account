<script setup>
import ActionSection from '@/Components/ActionSection.vue';
import Icon from '@/Components/Icon.vue';
import PrimaryButton from '@/Components/Buttons/PrimaryButton.vue';
import SecondaryButton from '@/Components/Buttons/SecondaryButton.vue';
import Content from '@/Components/ThirdPartyAccount/Content.vue';
import Card from '@/Components/ThirdPartyAccount/Card.vue';
import SocialContent from '@/Components/ThirdPartyAccount/SocialContent.vue';
import SocialiteLoginLogo from '@/Components/Social/SocialiteLoginLogo.vue';
import QQLogo from '@/Components/Social/QQLogo.vue';
import WechatLogo from '@/Components/Social/WechatLogo.vue';
import GithubLogo from '@/Components/Social/GithubLogo.vue';
import QQToRedirect from '@/Components/Social/QQToRedirect.vue';
import WechatToRedirect from '@/Components/Social//WechatToRedirect.vue';
import GithubToRedirect from '@/Components/Social//GithubToRedirect.vue';
import QQToDisconnect from '@/Components/Social/QQToDisconnect.vue';
import WechatToDisconnect from '@/Components/Social//WechatToDisconnect.vue';
import GithubToDisconnect from '@/Components/Social//GithubToDisconnect.vue';

</script>

<template>
    <ActionSection>
        <template #Icon>
            <Icon class="bg-gradient-to-br from-purple-200 to-purple-500">
                <template #icon>
                    <i class="fa-solid fa-link"></i>
                </template>
            </Icon>
        </template>

        <template #title>
            {{ $t('Third-party account') }}
        </template>

        <template #description>
            {{ $t('Manage and revoke your third-party accounts.') }}
        </template>

        <template #content>
            <div class="max-w-xl text-sm text-gray-600 dark:text-white">
                {{ $t('This list shows your third-party accounts, which you can manage and revoke.') }}
            </div>

            <!-- 第三方账号支持管理列表 -->
            <Content>
                <template #Cards>
                    <Card v-if="$page.props.logins.qq == 1">
                        <template #CardLogo>
                            <SocialiteLoginLogo class="mx-auto">
                                <QQLogo />
                            </SocialiteLoginLogo>
                        </template>

                        <template #CardNameText>
                            {{ $t('QQ') }}
                        </template>
                        
                        <template #SocialContent v-if="$page.props.userInformation.qq">
                            <SocialContent :SocialName="$page.props.userInformation.qq_username">
                                <template #SocialInformation>
                                    {{ $page.props.userInformation.qq_username }}
                                </template>
                                
                                <template #SocialButton>
                                    <QQToDisconnect>
                                        <SecondaryButton>
                                            {{ $t('auth.Disconnect') }}
                                        </SecondaryButton>
                                    </QQToDisconnect>
                                </template>
                            </SocialContent>
                        </template>

                        <template #SocialContent v-else>
                            <SocialContent :SocialName="true">
                                <template #SocialInformation>
                                    {{ $t('auth.Unconnected') }}
                                </template>
                                
                                <template #SocialButton>
                                    <QQToRedirect>
                                        <PrimaryButton>
                                            {{ $t('auth.Connect') }}
                                        </PrimaryButton>
                                    </QQToRedirect>
                                </template>
                            </SocialContent>
                        </template>
                    </Card>

                    <Card v-if="$page.props.logins.weixin == 1">
                        <template #CardLogo>
                            <SocialiteLoginLogo class="mx-auto">
                                <WechatLogo />
                            </SocialiteLoginLogo>
                        </template>

                        <template #CardNameText>
                            {{ $t('Wechat') }}
                        </template>
                        
                        <template #SocialContent v-if="$page.props.userInformation.weixin">
                            <SocialContent :SocialName="$page.props.userInformation.weixin_username">
                                <template #SocialInformation>
                                    {{ $page.props.userInformation.weixin_username }}
                                </template>
                                
                                <template #SocialButton>
                                    <WechatToDisconnect>
                                        <SecondaryButton>
                                            {{ $t('auth.Disconnect') }}
                                        </SecondaryButton>
                                    </WechatToDisconnect>
                                </template>
                            </SocialContent>
                        </template>

                        <template #SocialContent v-else>
                            <SocialContent :SocialName="true">
                                <template #SocialInformation>
                                    {{ $t('auth.Unconnected') }}
                                </template>
                                
                                <template #SocialButton>
                                    <WechatToDisconnect>
                                        <PrimaryButton>
                                            {{ $t('auth.Connect') }}
                                        </PrimaryButton>
                                    </WechatToDisconnect>
                                </template>
                            </SocialContent>
                        </template>
                    </Card>

                    <Card v-if="$page.props.logins.github == 1">
                        <template #CardLogo>
                            <SocialiteLoginLogo class="mx-auto">
                                <GithubLogo />
                            </SocialiteLoginLogo>
                        </template>

                        <template #CardNameText>
                            {{ $t('Github') }}
                        </template>
                        
                        <template #SocialContent v-if="$page.props.userInformation.github">
                            <SocialContent :SocialName="$page.props.userInformation.github_username">
                                <template #SocialInformation>
                                    {{ $page.props.userInformation.github_username }}
                                </template>
                                
                                <template #SocialButton>
                                    <GithubToDisconnect>
                                        <SecondaryButton>
                                            {{ $t('auth.Disconnect') }}
                                        </SecondaryButton>
                                    </GithubToDisconnect>
                                </template>
                            </SocialContent>
                        </template>

                        <template #SocialContent v-else>
                            <SocialContent :SocialName="true">
                                <template #SocialInformation>
                                    {{ $t('auth.Unconnected') }}
                                </template>
                                
                                <template #SocialButton>
                                    <GithubToRedirect>
                                        <PrimaryButton>
                                            {{ $t('auth.Connect') }}
                                        </PrimaryButton>
                                    </GithubToRedirect>
                                </template>
                            </SocialContent>
                        </template>
                    </Card>
                </template>
            </Content>
        </template>
    </ActionSection>
</template>
