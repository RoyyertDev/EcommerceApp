<script setup>
import Attention from '@/components/myComponents/landing/Attention.vue';
import BestSellers from '@/components/myComponents/landing/BestSellers.vue';
import Header from '@/components/myComponents/landing/Header.vue';
import Offer from '@/components/myComponents/landing/Offer.vue';
import Promotions from '@/components/myComponents/landing/Promotions.vue';
import Store from '@/components/myComponents/landing/Store.vue';
import LandingLayout from '@/layouts/landing/LandingLayout.vue';
import { Head } from '@inertiajs/vue3';
defineProps({
    canLogin: {
        type: Boolean,
    },
});
</script>

<template>
    <Head title="Welcome" />
    <LandingLayout :canLogin="canLogin">
        <main class="mx-auto w-5/6">
            <Header />
            <Offer />
            <Attention />
            <Store />
            <BestSellers />
            <Promotions />
        </main>
    </LandingLayout>
</template>
