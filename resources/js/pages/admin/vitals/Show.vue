<script setup>
import AdminLayout from '@/layouts/admin/AdminLayout.vue';
import CategoryProducts from './CategoryProducts.vue';
import Colors from './Colors.vue';
import MaterialProducts from './MaterialProducts.vue';
import Sizes from './Sizes.vue';
import Stickies from './Stickies.vue';

defineProps({
    vitals: Object,
    errors: Object,
});
</script>
<template>
    <AdminLayout title="Vitales">
        <template #header>Gestión de Productos</template>
        <main class="grid grid-cols-2">
            <MaterialProducts :errors="errors.materialProducts" :materialProducts="vitals.materialProducts" />
            <CategoryProducts :errors="errors.categoryProducts" :categoryProducts="vitals.categoryProducts" />
            <Colors :errors="errors.colors" :colors="vitals.colors" />
            <Sizes :errors="errors.sizes" :sizes="vitals.sizes" />
            <Stickies :errors="errors.stickies" :stickies="vitals.stickies" />
        </main>
    </AdminLayout>
</template>
