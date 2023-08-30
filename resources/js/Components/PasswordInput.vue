<script setup>
import { onMounted, onUnmounted, ref } from 'vue';
import TextInput from '@/Components/TextInput.vue';
import PasswordMeter from 'vue-simple-password-meter';

const props = defineProps({
    active: Boolean,
    refInput: String,
    IdInput: String,
    formValue: String,
    autocompleteInput: String,
    placeholderInput: String,
    activeInput: String,
    createOrUpdate: String,
});

// 显示和隐藏密码
let showPassword = ref(false); //默认闭眼图标
let type = ref("password"); //登录密码隐藏
const showPwd = () => {
  showPassword.value = !showPassword.value;
  if (showPassword.value == false) {
    type.value = "password";
  } else {
    type.value = "text";
  };
};

// 密码提示窗口
let open = ref(false);

const closeOnEscape = (e) => {
    if (open.value && e.key === 'Escape') {
        open.value = false;
    }
};

onMounted(() => document.addEventListener('keydown', closeOnEscape));
onUnmounted(() => document.removeEventListener('keydown', closeOnEscape));
</script>

<template>
    <div class="relative">
      <!-- 非元素区域点击关闭密码提示窗口 -->
      <div v-show="open" class="fixed inset-0 z-40" @click="open = false" />
      <TextInput
        :id="IdInput"
        :ref="refInput"
        :value="formValue"
        @input="$emit('update:formValue', $event.target.value)"
        :type="type"
        required
        :autocomplete="autocompleteInput"
        :placeholder="placeholderInput"
        :active="activeInput"
        oninput="value=value.replace(/[\u4E00-\u9FA5]/g,'')"
        @click="open = ! open"
      />
      <div class="w-5 absolute inset-y-0 right-4 inline-flex items-center">
          <button type="button" class="w-full text-center text-gray-400 hover:text-gray-500 dark:hover:text-gray-300" @click="showPwd">
            <i class="fa-solid fa-eye" v-show="showPassword == true" />
            <i class="fa-solid fa-eye-slash" v-show="showPassword == false" />
          </button>
      </div>
    </div>
    <div v-if="createOrUpdate" v-show="open" class="absolute z-50 mt-2 rounded-md shadow-lg bg-white w-64 sm:w-80 p-2.5 text-sm">
      <div>
        <h2 class="mb-2 font-semibold text-gray-900">{{ $t('Password strength') }}</h2>
        <password-meter :password="formValue" />
      </div>
      <div class="mt-2">
        <h2 class="mb-2 font-semibold text-gray-900">{{ $t('Password rule') }}</h2>
        <ul class="max-w-md space-y-1 text-gray-500 list-none list-inside dark:text-gray-400" />
        <li>
          {{ $t('Minimum 8 characters') }}
        </li>
        <li>
          {{ $t('At least one lowercase or uppercase') }}
        </li>
        <li>
          {{ $t('At least one numeric') }}
        </li>
      </div>
    </div>
</template>