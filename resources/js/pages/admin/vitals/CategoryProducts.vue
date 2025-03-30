<script setup>
import InputError from '@/components/InputError.vue';
import DivVitals from '@/components/myComponents/admin/vitals/DivVitals.vue';
import ButtonRegisterAdmin from '@/components/myComponents/ButtonRegisterAdmin.vue';
import { useForm } from '@inertiajs/vue3';

const props = defineProps({
    categoryProducts: Object,
    errors: Object,
});

const form = useForm({
    name: '',
});

const submit = () => {
    form.post(route('admin.categories.store'), {
        onFinish: () => {
            form.reset();
            return redirect(route('admin.vitals.create'));
        },
    });
};
</script>
<template>
    <DivVitals title="Categorias de productos">
        <template #head>
            <form class="flex gap-4" @submit.prevent>
                <fieldset>
                    <input
                        v-model="form.name"
                        class="h-9 rounded-lg border-gray-300 bg-gray-200 py-3 text-sm text-black focus:border-gray-300 focus:ring-transparent dark:border-zinc-700 dark:bg-zinc-800 dark:text-white dark:focus:border-zinc-700"
                        type="text"
                        placeholder="Nombre"
                    />
                    <InputError v-if="errors?.name" class="block" :message="errors.name[0]" />
                </fieldset>
                <ButtonRegisterAdmin @toggle="submit">Registrar</ButtonRegisterAdmin>
            </form>
        </template>
        <template #thHead>
            <th class="">Nombre</th>
        </template>
        <template #tBody>
            <tr
                v-for="categoryProduct in categoryProducts"
                class="transition-categoryProducts my-1 h-12 border-b border-gray-300 duration-200 hover:bg-gray-200 dark:border-zinc-800 dark:hover:bg-zinc-800"
                v-key="categoryProduct.id"
            >
                <td class="w-12 text-center">
                    <input
                        class="h-5 w-5 cursor-pointer rounded-md border-gray-300 bg-gray-200 text-[#DE5976] hover:border-gray-400 hover:bg-gray-300 focus:ring-0 dark:border-zinc-800 dark:bg-zinc-800 dark:hover:border-zinc-600 dark:hover:bg-zinc-700"
                        type="checkbox"
                        name=""
                        id=""
                    />
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
