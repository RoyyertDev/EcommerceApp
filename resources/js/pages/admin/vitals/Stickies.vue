<script setup>
    import DivTable from '@/components/myComponents/DivTable.vue';

    defineProps({
      stickies: Object,
    })
</script>
<template>
    <DivTable>
        <template #thHead>
            <th class="">Nombre</th>
            <th class="">Acciones</th>
        </template>

        <template #tBody>
            <tr v-for="sticky in stickies"
                class="my-1 h-12 border-b border-gray-300 transition-colors duration-200 hover:bg-gray-200 dark:border-zinc-800 dark:hover:bg-zinc-800"
                v-key="sticky.id">
                <td class="w-12 text-center">
                    <input
                        class="h-5 w-5 cursor-pointer rounded-md border-gray-300 bg-gray-200 text-[#DE5976] hover:border-gray-400 hover:bg-gray-300 focus:ring-0 dark:border-zinc-800 dark:bg-zinc-800 dark:hover:border-zinc-600 dark:hover:bg-zinc-700"
                        type="checkbox" name="" id="" />
                </td>
                <td class="">{{ sticky.name }}</td>
                <td class="flex h-12 w-28 gap-2">
                    <!-- <UpdateView :product="product" :key="'update -' + product.id" :types="types"
                        :categories="categories" :materials="materials" /> -->
                </td>
            </tr>
        </template>
        <template #footer>
            <!-- <Pagination :links="products.links" /> -->
        </template>
    </DivTable>
</template>
