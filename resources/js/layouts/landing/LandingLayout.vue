<script setup>
import Footer from '@/components/partials/Footer.vue';
import Header from '@/components/partials/Header.vue';
defineProps({
    canLogin: {
        type: Boolean,
    },
});
</script>
<template>
    <Header :canLogin="canLogin" />
    <slot />
    <Footer />
</template>
