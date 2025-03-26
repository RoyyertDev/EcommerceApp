<script setup>
import DivTable from '@/components/myComponents/DivTable.vue';
import AdminLayout from '@/layouts/admin/AdminLayout.vue';
import CreateView from '@/pages/admin/variants/Create.vue';
import UpdateView from '@/pages/admin/variants/Update.vue';

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
                            <img
                                :src="variant.image"
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
                            <img :src="'/svg/admin/variants/' + (variant.promotion ? 'checked.svg' : 'notChecked.svg')" alt="" />
                        </td>
                        <td class="">{{ variant.discount }}%</td>
                        <td class="">{{ variant.created_at }}</td>
                        <UpdateView :variant="variant" :colors="colors" :stickies="stickies" :sizes="sizes" :key="'update-' + variant.id" />
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
