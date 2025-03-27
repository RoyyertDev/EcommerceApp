<script setup>
import AdminLayout from '@/layouts/admin/AdminLayout.vue';
import About from './About.vue';
import Attention from './Attention.vue';
import Carrousel from './Carrousel.vue';
import OurStore from './OurStore.vue';

const props = defineProps({
    assets: Object,
});
</script>

<template>
    <AdminLayout title="Landing">
        <template #header>Gestionar Landing</template>
        <main class="mx-auto grid max-w-7xl grid-cols-2 gap-4 px-8 py-12 text-black dark:text-white">
            <section class="flex flex-col gap-4">
                <Carrousel :carrousel="assets.carrousel" />
                <Attention :attentions="assets.attentions" />
            </section>
            <section class="grid grid-cols-2 gap-4">
                <OurStore class="col-span-2" :ourStore="assets.ourStore" />
                <About :about="assets.about" />
            </section>
        </main>
    </AdminLayout>
</template>
