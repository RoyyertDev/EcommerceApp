<script setup lang="ts">
import Nav from '@/components/myComponents/admin/Nav.vue';
import { Head } from '@inertiajs/vue3';

defineProps({
    title: String,
});
</script>

<template>
    <Head :title="'Admin | ' + title" />
    <Nav />
    <header v-if="$slots.header" class="bg-gray-100 shadow dark:bg-zinc-900">
        <h1 class="mx-auto max-w-7xl px-4 py-6 sm:px-6 lg:px-8">
            <slot name="header" />
        </h1>
    </header>
    <slot />
    <footer>Footer proximamente</footer>
</template>
