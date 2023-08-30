<script setup>
import TipCard from './TipCard.vue';
</script>

<template>
  <div class="fixed top-16 right-8 z-50">
    <!-- 基础弹窗 -->
    <TipCard :TipText="$page.props.message">
      <span class="text-gray-600">
        <i class="fa-solid fa-circle-exclamation"></i>
      </span>
    </TipCard>
    <!-- 成功弹窗 -->
    <TipCard :TipText="$page.props.success">
      <span class="text-green-600">
        <i class="fa-solid fa-circle-check"></i>
      </span>
    </TipCard>
    <!-- 错误弹窗 -->
    <TipCard :TipText="$page.props.error">
      <span class="text-red-600">
        <i class="fa-solid fa-circle-xmark"></i>
      </span>
    </TipCard>
  </div>
</template>