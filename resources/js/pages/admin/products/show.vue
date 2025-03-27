<script setup>
import ButtonFilter from '@/components/myComponents/ButtonFilter.vue';
import DivTable from '@/components/myComponents/DivTable.vue';
// import Pagination from '@/components/Pagination.vue';
import AdminLayout from '@/layouts/admin/AdminLayout.vue';
import CreateView from '@/pages/admin/products/Create.vue';
import UpdateView from '@/pages/admin/products/Update.vue';
import { Link } from '@inertiajs/vue3';
import { ref } from 'vue';
const category = ref('');
const material = ref('');

const props = defineProps({
    products: Array,
    types: Array,
    categories: Array,
    materials: Array,
});
</script>

<template>
    <AdminLayout title="Productos">
        <template #header>Gestionar Productos</template>
        <main class="min-h-screen bg-gray-50 dark:bg-zinc-950">
            <DivTable>
                <template #buttonsFilter>
                    <ButtonFilter type="''">Todos</ButtonFilter>
                    <ButtonFilter type="1">Exclusivo</ButtonFilter>
                    <ButtonFilter type="2">Casual</ButtonFilter>
                    <ButtonFilter type="3">Deportivo</ButtonFilter>
                    <ButtonFilter type="4">Uniformes</ButtonFilter>
                </template>
                <template #SelectedCatFilter>
                    <select
                        v-model="category"
                        name="category"
                        id="category"
                        class="h-9 w-64 cursor-pointer rounded-lg border-transparent bg-gray-200 text-sm text-black focus:border-transparent focus:ring-transparent dark:bg-zinc-800 dark:text-white"
                    >
                        <option selected value="">Todas las categorias</option>
                        <option v-for="categoryProduct in categories" :value="categoryProduct.id">{{ categoryProduct.name }}</option>
                    </select>
                </template>
                <template #SelectedMatFilter>
                    <select
                        v-model="material"
                        name="material"
                        id="material"
                        class="h-9 w-64 cursor-pointer rounded-lg border-transparent bg-gray-200 text-sm text-black focus:border-transparent focus:ring-transparent dark:bg-zinc-800 dark:text-white"
                    >
                        <option selected value="">Todos los materiales</option>
                        <option v-for="materialProduct in materials" :value="materialProduct.id">{{ materialProduct.name }}</option>
                    </select>
                </template>
                <template #buttonAside>
                    <CreateView :types="types" :categories="categories" :materials="materials" />
                </template>
                <template #optionsOrderBy>
                    <option value="id">Registro</option>
                    <option value="name">Nombres</option>
                    <option value="description">Descripción</option>
                    <option value="created_at">Registrado</option>
                </template>

                <template #thHead>
                    <th class="">Nombre</th>
                    <th class="">Descripción</th>
                    <th class="">Tipo</th>
                    <th class="">Categoria</th>
                    <th class="">Material</th>
                    <th class="">Registrado</th>
                </template>

                <template #tBody>
                    <tr
                        v-for="product in products"
                        class="my-1 h-12 border-b border-gray-300 transition-colors duration-200 hover:bg-gray-200 dark:border-zinc-800 dark:hover:bg-zinc-800"
                        v-key="product - product.id"
                    >
                        <td class="w-12 text-center">
                            <input
                                class="h-5 w-5 cursor-pointer rounded-md border-gray-300 bg-gray-200 text-[#DE5976] hover:border-gray-200 hover:bg-gray-300 focus:ring-0 dark:border-zinc-700 dark:bg-zinc-800 dark:hover:border-zinc-600 dark:hover:bg-zinc-700"
                                type="checkbox"
                                name=""
                                id=""
                            />
                        </td>
                        <td class="">{{ product.name }}</td>
                        <td class="">{{ product.description }}</td>
                        <td class="">{{ product.type_product.name }}</td>
                        <td class="">{{ product.category_product.name }}</td>
                        <td class="">{{ product.material_products.name }}</td>
                        <td class="">{{ product.created_at }}</td>
                        <td class="flex h-12 w-28 gap-2">
                            <Link
                                v-key="variant - product.id"
                                :href="route('admin.variants.create', product.id)"
                                class="flex items-center justify-center gap-1 text-green-600 transition-all duration-300 hover:scale-110"
                            >
                                <svg fill="#16a34a" xmlns="http://www.w3.org/2000/svg" height="20px" id="icon" viewBox="0 0 32 32" width="20px">
                                    <path
                                        class="cls-1"
                                        d="M23,9h6a2,2,0,0,0,2-2V3a2,2,0,0,0-2-2H23a2,2,0,0,0-2,2V4H11V3A2,2,0,0,0,9,1H3A2,2,0,0,0,1,3V7A2,2,0,0,0,3,9H9a2,2,0,0,0,2-2V6h4V26a2.0023,2.0023,0,0,0,2,2h4v1a2,2,0,0,0,2,2h6a2,2,0,0,0,2-2V25a2,2,0,0,0-2-2H23a2,2,0,0,0-2,2v1H17V17h4v1a2,2,0,0,0,2,2h6a2,2,0,0,0,2-2V14a2,2,0,0,0-2-2H23a2,2,0,0,0-2,2v1H17V6h4V7A2,2,0,0,0,23,9Zm0-6h6V7H23ZM9,7H3V3H9ZM23,25h6v4H23Zm0-11h6v4H23Z"
                                        transform="translate(0 0.0049)"
                                    />
                                </svg>
                                Ver
                            </Link>
                            <UpdateView
                                :product="product"
                                :key="'update -' + product.id"
                                :types="types"
                                :categories="categories"
                                :materials="materials"
                            />
                        </td>
                    </tr>
                </template>
                <template #footer>
                    <!-- <Pagination :links="products.links" /> -->
                </template>
            </DivTable>
        </main>
    </AdminLayout>
</template>
