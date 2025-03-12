<script setup>
import LandingLayout from '@/layouts/landing/LandingLayout.vue';
import { Head } from '@inertiajs/vue3';
import Header from '@/components/myComponents/about/Header.vue';
import Mission from '@/components/myComponents/about/Mission.vue';
import Vision from '@/components/myComponents/about/Vision.vue';
import History from '@/components/myComponents/about/History.vue';
import Path from '@/components/myComponents/about/Path.vue';
defineProps({
    canLogin: {
        type: Boolean,
    },
});
</script>
<template>
    <Head title="About" />
    <LandingLayout :canLogin="canLogin">
        <main class="mx-auto w-5/6">
            <Header />
            <Mission />
            <Vision />
            <History />
            <Path />
        </main>
    </LandingLayout>
</template>
