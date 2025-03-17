<script setup>
import DivTable from '@/components/myComponents/DivTable.vue';
import AdminLayout from '@/layouts/admin/AdminLayout.vue';

const props = defineProps({
    variants: Object,
    product: String,
});
</script>
<template>
    <AdminLayout title="Productos">
        <template #header>Gestionar Variantes de {{ props.product }}</template>
        <main class="min-h-screen bg-gray-50 dark:bg-zinc-950">
            <DivTable></DivTable>
        </main>
    </AdminLayout>
</template>
