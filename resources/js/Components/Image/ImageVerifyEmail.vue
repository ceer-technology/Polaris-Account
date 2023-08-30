<script setup>
import Image from './Image.vue';
import imagePath from '../../../../public/img/AuthCard/image4.webp'
</script>

<template>
    <Image :style="{ backgroundImage: `url(${imagePath})` }" />
</template>