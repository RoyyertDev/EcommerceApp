<script setup>
import DivTable from '@/components/myComponents/DivTable.vue';
import AdminLayout from '@/layouts/admin/AdminLayout.vue';
import CreateView from '@/pages/admin/variants/Create.vue';

const props = defineProps({
    variants: Object,
    product: Object,
    stickies: Array,
    colors: Array,
    sizes: Array,
});
</script>
<template>
    <AdminLayout title="Productos">
        <template #header>Gestionar Variantes de {{ props.product.name }}</template>
        <main class="min-h-screen bg-gray-50 dark:bg-zinc-950">
            <DivTable>
                <template #buttonsFilter>
                    <x-button-filter type="''">Todos</x-button-filter>
                    <x-button-filter type="1">Promoción</x-button-filter>
                </template>
                <template #buttonAside>
                    <CreateView
                        :product="{ name: props.product.name, id: props.product.id }"
                        :stickies="props.stickies"
                        :colors="props.colors"
                        :sizes="props.sizes"
                    />
                </template>
                <template #optionsOrderBy>
                    <option value="id">Registro</option>
                    <option value="price">Precio</option>
                    <option value="stock">Cantidad</option>
                    <option value="number_sales">Numeor de ventas</option>
                    <option value="created_at">Registrado</option>
                </template>
                <template #thHead>
                    <th class="">Imagen</th>
                    <th class="">Color</th>
                    <th class="">Sticky</th>
                    <th class="">Talla</th>
                    <th class="">Precio</th>
                    <th class="">Cantidad</th>
                    <th class="">Número de ventas</th>
                    <th class="">Promoción</th>
                    <th class="">Descuento</th>
                    <th class="">Registrado</th>
                </template>
                <template #tBody>
                    <tr
                        v-for="variant in variants"
                        class="my-1 h-12 border-b border-gray-300 transition-colors duration-200 hover:bg-gray-200 dark:border-zinc-800 dark:hover:bg-zinc-800"
                        :key="'variant-' + variant.id"
                    >
                        <td class="w-12 text-center">
                            <input
                                class="h-5 w-5 cursor-pointer rounded-md border-gray-300 bg-gray-200 text-[#DE5976] hover:border-gray-400 hover:bg-gray-300 focus:ring-0 dark:border-zinc-800 dark:bg-zinc-800 dark:hover:border-zinc-600 dark:hover:bg-zinc-700"
                                type="checkbox"
                                name=""
                                id=""
                            />
                        </td>
                        <td class="p-1">
                            <!-- :src="Storage::url(variant.image)" -->
                            <img
                                :alt="variant.fk_characteristic"
                                class="h-8 w-8 rounded-md object-cover transition duration-300 hover:scale-[300%]"
                            />
                        </td>
                        <td class="flex h-12 items-center gap-2">
                            <div
                                class="h-5 w-5 rounded-md"
                                :style="'background-color: ' + '#' + variant.characteristic.color_sticky.color.hexadecimal"
                            ></div>
                            {{ variant.characteristic.color_sticky.color.name }}
                        </td>
                        <td class="">{{ variant.characteristic.color_sticky.sticky.name }}</td>
                        <td class="">{{ variant.characteristic.size.name }}</td>
                        <td class="">{{ variant.price }}</td>
                        <td class="">{{ variant.stock }}</td>
                        <td class="">{{ variant.number_sales }}</td>
                        <td class="">
                            <svg
                                v-if="variant.promotion"
                                xmlns="http://www.w3.org/2000/svg"
                                x="0px"
                                y="0px"
                                width="20px"
                                height="20px"
                                viewBox="0,0,256,256"
                            >
                                <g
                                    fill="#22c600"
                                    fill-rule="nonzero"
                                    stroke="none"
                                    stroke-width="1"
                                    stroke-linecap="butt"
                                    stroke-linejoin="miter"
                                    stroke-miterlimit="10"
                                    stroke-dasharray=""
                                    stroke-dashoffset="0"
                                    font-family="none"
                                    font-weight="none"
                                    font-size="none"
                                    text-anchor="none"
                                    style="mix-blend-mode: normal"
                                >
                                    <g transform="scale(9.84615,9.84615)">
                                        <path
                                            d="M13,1c-6.61719,0 -12,5.38281 -12,12c0,6.61719 5.38281,12 12,12c6.61719,0 12,-5.38281 12,-12c0,-6.61719 -5.38281,-12 -12,-12zM13,3c5.53516,0 10,4.46484 10,10c0,5.53516 -4.46484,10 -10,10c-5.53516,0 -10,-4.46484 -10,-10c0,-5.53516 4.46484,-10 10,-10zM17.1875,7.0625c-0.14844,0.02344 -0.27344,0.10156 -0.375,0.25l-4.90625,7.28125l-2.3125,-2.28125c-0.19922,-0.30078 -0.58203,-0.32422 -0.78125,-0.125l-0.90625,0.90625c-0.19922,0.30078 -0.19922,0.70703 0,0.90625l3.5,3.5c0.19922,0.10156 0.48047,0.3125 0.78125,0.3125c0.19922,0 0.51953,-0.10547 0.71875,-0.40625l6,-8.8125c0.19922,-0.30078 0.08594,-0.58203 -0.3125,-0.78125l-1,-0.71875c-0.10156,-0.05078 -0.25781,-0.05469 -0.40625,-0.03125z"
                                        ></path>
                                    </g>
                                </g>
                            </svg>
                            <svg v-else xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" width="20px" height="20px" viewBox="0,0,256,256">
                                <g
                                    fill="#FF311D"
                                    fill-rule="nonzero"
                                    stroke="none"
                                    stroke-width="1"
                                    stroke-linecap="butt"
                                    stroke-linejoin="miter"
                                    stroke-miterlimit="10"
                                    stroke-dasharray=""
                                    stroke-dashoffset="0"
                                    font-family="none"
                                    font-weight="none"
                                    font-size="none"
                                    text-anchor="none"
                                    style="mix-blend-mode: normal"
                                >
                                    <g transform="scale(10.66667,10.66667)">
                                        <path
                                            d="M12,2c-5.511,0 -10,4.489 -10,10c0,5.511 4.489,10 10,10c5.511,0 10,-4.489 10,-10c0,-5.511 -4.489,-10 -10,-10zM12,4c4.43012,0 8,3.56988 8,8c0,4.43012 -3.56988,8 -8,8c-4.43012,0 -8,-3.56988 -8,-8c0,-4.43012 3.56988,-8 8,-8zM8.70703,7.29297l-1.41406,1.41406l3.29297,3.29297l-3.29297,3.29297l1.41406,1.41406l3.29297,-3.29297l3.29297,3.29297l1.41406,-1.41406l-3.29297,-3.29297l3.29297,-3.29297l-1.41406,-1.41406l-3.29297,3.29297z"
                                        ></path>
                                    </g>
                                </g>
                            </svg>
                        </td>
                        <td class="">{{ variant.discount }}%</td>
                        <td class="">{{ variant.created_at }}</td>
                        <!-- <td class="">@livewire('admin.variants.update', ['id' => variant->id], key('update-' . variant->id))</td> -->
                    </tr>
                </template>
                <template #footer>
                    <!-- {{ variants.links() }} -->
                </template>
            </DivTable>
        </main>
    </AdminLayout>
</template>
