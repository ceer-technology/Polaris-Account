<script setup>
import { ref } from 'vue';

// 从Laravel传递的错误消息
const props = defineProps({
  TipText: String
})

// 控制div的显示状态
const show = ref(true)

// 关闭弹窗并清除消息
const emit = defineEmits(['update:TipText'])

const closeAlert = () => {
  show.value = false
  emit('update:TipText', null)
}

// 设置20s后自动关闭弹窗
if (props.TipText) {
  setTimeout(closeAlert, 5000)
}
</script>

<template>
  <div v-if="TipText" v-show="show" role="alert" class="rounded-xl border border-gray-100 bg-white p-4 shadow-xl animate-notification">
    <div class="flex inline-flex items-center gap-3">
      <div class="text-lg">
        <slot />
      </div>

      <div class="flex-1">
        <p class="mt-1 text-sm text-gray-700">
          {{ TipText }}
        </p>
      </div>

      <button type="button" class="text-gray-500 transition hover:text-gray-600" data-dismiss="alert" aria-label="Close"
        @click="closeAlert">
        <span class="text-sm" aria-hidden="true">
          <i class="fa-solid fa-xmark"></i>
        </span>
      </button>
    </div>
  </div>
</template>