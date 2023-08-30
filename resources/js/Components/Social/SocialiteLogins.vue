<script setup>
import SocialiteLoginLogo from './SocialiteLoginLogo.vue';
import QQLogo from './QQLogo.vue';
import WechatLogo from './WechatLogo.vue';
import GithubLogo from './GithubLogo.vue';
import QQToRedirect from './QQToRedirect.vue';
import WechatToRedirect from './WechatToRedirect.vue';
import GithubToRedirect from './GithubToRedirect.vue';
</script>

<template>
  <div class="mt-5 flex flex-wrap justify-around">
    <QQToRedirect v-if="$page.props.logins.qq == 1">
      <SocialiteLoginLogo class="cursor-pointer opacity-80 transition duration-300 hover:opacity-100">
        <QQLogo />
      </SocialiteLoginLogo>
    </QQToRedirect> 

    <WechatToRedirect v-if="$page.props.logins.weixin == 1">
      <SocialiteLoginLogo class="cursor-pointer opacity-80 transition duration-300 hover:opacity-100">
        <WechatLogo />
      </SocialiteLoginLogo>
    </WechatToRedirect>

    <GithubToRedirect v-if="$page.props.logins.github == 1">
      <SocialiteLoginLogo class="cursor-pointer opacity-80 transition duration-300 hover:opacity-100">
        <GithubLogo />
      </SocialiteLoginLogo>
    </GithubToRedirect>
  </div>
</template>