<script setup>
import { Head, Link } from '@inertiajs/vue3';
import LandingLayout from '@/layouts/landing/LandingLayout.vue';
defineProps({
    canLogin: {
        type: Boolean,
    },
    canRegister: {
        type: Boolean,
    },
});


</script>

<template>
    <LandingLayout :canLogin="canLogin" :canRegister="canRegister">
    </LandingLayout>
</template>
