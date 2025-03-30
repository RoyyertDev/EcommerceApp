<script setup>
import ButtonRegisterAdmin from '@/components/myComponents/ButtonRegisterAdmin.vue';
import DivVitals from '@/components/myComponents/admin/vitals/DivVitals.vue';

defineProps({
    colors: Object,
});
</script>
<template>
    <DivVitals>
        <template #head>
            <h1>Colores</h1>
            <form class="flex gap-4">
                <input
                    v-model="search"
                    class="h-9 rounded-lg  border-gray-300 bg-gray-200 py-3 text-sm text-black focus:border-gray-300 focus:ring-transparent dark:border-zinc-700 dark:bg-zinc-800 dark:text-white dark:focus:border-zinc-700"
                    type="search"
                    placeholder="Buscar..."
                />
                <input
                    v-model="search"
                    class="h-9 rounded-lg border-gray-300 bg-gray-200 py-3 text-sm text-black focus:border-gray-300 focus:ring-transparent dark:border-zinc-700 dark:bg-zinc-800 dark:text-white dark:focus:border-zinc-700"
                    type="search"
                    placeholder="Buscar Hexadecimal"
                />
                <ButtonRegisterAdmin class=" ">Registrar</ButtonRegisterAdmin>
            </form>
        </template>
        <template #thHead>
            <th class="">Nombre</th>
            <th class="">Hexadecimal</th>
        </template>
        <template #tBody>
            <tr
                v-for="color in colors"
                class="my-1 h-12 border-b border-gray-300 transition-colors duration-200 hover:bg-gray-200 dark:border-zinc-800 dark:hover:bg-zinc-800"
                v-key="color.id"
            >
                <td class="w-12 text-center">
                    <input
                        class="h-5 w-5 cursor-pointer rounded-md border-gray-300 bg-gray-200 text-[#DE5976] hover:border-gray-400 hover:bg-gray-300 focus:ring-0 dark:border-zinc-800 dark:bg-zinc-800 dark:hover:border-zinc-600 dark:hover:bg-zinc-700"
                        type="checkbox"
                        name=""
                        id=""
                    />
                </td>
                <td class="">{{ color.name }}</td>
                <td class="">{{ color.hexadecimal }}:<span class="h-5 w-5 inline-block rounded-md" :style="'background-color: ' + '#' + color.hexadecimal"></span></td>
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
