<script setup>
import AdminLayout from '@/layouts/admin/AdminLayout.vue';
import CategoryProducts from './CategoryProducts.vue';
import Colors from './Colors.vue';
import MaterialProducts from './MaterialProducts.vue';
import Sizes from './Sizes.vue';
import Stickies from './Stickies.vue';

defineProps({
    vitals: Object,
});
</script>
<template>
    <AdminLayout title="Vitales">
        <template #header>Gestión de Productos</template>
        <main class="grid grid-cols-2">
            <MaterialProducts :materialProducts="vitals.materialProducts" />
            <CategoryProducts :categoryProducts="vitals.categoryProducts" />
            <Colors :colors="vitals.colors" />
            <Sizes :sizes="vitals.sizes" />
            <Stickies :stickies="vitals.stickies" />
        </main>
    </AdminLayout>
</template>
