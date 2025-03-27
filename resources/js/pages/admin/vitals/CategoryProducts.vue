<script setup>
    import DivVitals from '@/components/myComponents/admin/vitals/DivVitals.vue';
    import ButtonRegisterAdmin from '@/components/myComponents/ButtonRegisterAdmin.vue';

    defineProps({
        categoryProducts: Object,
    })
</script>
<template>
    <DivVitals>
        <template #head>
            <form class="flex gap-4">
                <input v-model="search" class=" py-5 bg-gray-200 dark:bg-zinc-800 rounded-lg border-gray-300 dark:border-zinc-700 h-9 text-black dark:text-white text-sm focus:border-gray-300 dark:focus:border-zinc-700 focus:ring-transparent" type="search" placeholder="Buscar...">
                <ButtonRegisterAdmin class="">Registrar</ButtonRegisterAdmin>
            </form>
        </template>
        <template #thHead>
            <th class="">Nombre</th>
        </template>
        <template #tBody>
            <tr v-for="categoryProduct in categoryProducts"
                class="my-1 h-12 border-b border-gray-300 transition-categoryProducts duration-200 hover:bg-gray-200 dark:border-zinc-800 dark:hover:bg-zinc-800"
                v-key="categoryProduct.id">
                <td class="w-12 text-center">
                    <input
                        class="h-5 w-5 cursor-pointer rounded-md border-gray-300 bg-gray-200 text-[#DE5976] hover:border-gray-400 hover:bg-gray-300 focus:ring-0 dark:border-zinc-800 dark:bg-zinc-800 dark:hover:border-zinc-600 dark:hover:bg-zinc-700"
                        type="checkbox" name="" id="" />
                </td>
                <td class="">{{ categoryProduct.name }}</td>
                <td class="flex h-12 w-28 gap-2">
                    <!-- <UpdateView :product="product" :key="'update -' + product.id" :types="types"
                        :categories="categories" :materials="materials" /> -->
                </td>
            </tr>
        </template>
        <template #footer>
            <!-- <Pagination :links="products.links" /> -->
        </template>
    </DivVitals>
</template>
