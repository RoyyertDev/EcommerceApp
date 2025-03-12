<script setup>
import LandingLayout from '@/layouts/landing/LandingLayout.vue';
import { Head } from '@inertiajs/vue3';
defineProps({
    canLogin: {
        type: Boolean,
    },
});
</script>
<template>
    <Head title="About" />
    <LandingLayout :canLogin="canLogin">
        <main class="mx-auto w-5/6"></main>
    </LandingLayout>
</template>
