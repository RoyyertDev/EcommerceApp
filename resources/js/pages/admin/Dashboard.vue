<script setup>
import Widget from '@/components/myComponents/admin/dashboard/Widget.vue';
import AdminLayout from '@/layouts/admin/AdminLayout.vue';

const props = defineProps({
    widgetCount: Object,
})
console.log(props.widgetCount)
const widgetInfo = [
    {
        title: 'Clientes',
        h4: props.widgetCount.users,
        icon: '/svg/admin/dashboard/clients.svg',
    },
    {
        title: 'Productos',
        h4: props.widgetCount.products,
        icon: '/svg/admin/dashboard/products.svg',
    },
    {
        title: 'Variantes',
        h4: props.widgetCount.variants,
        icon: '/svg/admin/dashboard/variants.svg',
    },
    {
        title: 'Tipos de productos',
        h4: props.widgetCount.typeProducts,
        icon: '/svg/admin/dashboard/typeProducts.svg',
    },
    {
        title: 'Categorias de productos',
        h4: props.widgetCount.categoryProducts,
        icon: '/svg/admin/dashboard/categoryProducts.svg',
    },
    {
        title: 'Materiales de productos',
        h4: props.widgetCount.materialProducts,
        icon: '/svg/admin/dashboard/materialProducts.svg',
    },
    {
        title: 'Colores',
        h4: props.widgetCount.colors,
        icon: '/svg/admin/dashboard/colors.svg',
    },
    {
        title: 'Tallas',
        h4: props.widgetCount.sizes,
        icon: '/svg/admin/dashboard/sizes.svg',
    },
    {
        title: 'Stickies',
        h4: props.widgetCount.stickies,
        icon: '/svg/admin/dashboard/stickys.svg',
    },
];
</script>

<template>
    <AdminLayout title="Gestionar">
        <template #header>Modulo de gestion</template>
        <main>
            <div class="py-12">
                <div class="mx-auto grid max-w-7xl grid-cols-5 gap-4 px-8 text-black dark:text-white">
                    <Widget v-for="(widget, index) in widgetInfo" :key="index" :title="widget.title" :h4="widget.h4">
                        <img :src="widget.icon" :alt="widget.title" />
                    </Widget>
                </div>
            </div>
        </main>
    </AdminLayout>
</template>
