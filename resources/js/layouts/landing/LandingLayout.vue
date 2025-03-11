<script setup>
  import  Header from '@/components/land/Header.vue';
  import  Footer from '@/components/land/Footer.vue';
  defineProps({
    canLogin: {
        type: Boolean,
    },
    canRegister: {
        type: Boolean,
    },
  })
</script>
<template>
  <Header :canLogin="canLogin" :canRegister="canRegister" />
  <slot />
  <Footer />
</template>