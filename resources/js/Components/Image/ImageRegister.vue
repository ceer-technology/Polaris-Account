<script setup>
import Image from './Image.vue';
import imagePath from '../../../../public/img/AuthCard/image2.webp'
</script>

<template>
    <Image :style="{ backgroundImage: `url(${imagePath})` }" />
</template>