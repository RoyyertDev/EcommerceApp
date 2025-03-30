<script setup>
import InputError from '@/components/InputError.vue';
import DivVitals from '@/components/myComponents/admin/vitals/DivVitals.vue';
import ButtonRegisterAdmin from '@/components/myComponents/ButtonRegisterAdmin.vue';
import { useForm } from '@inertiajs/vue3';

const props = defineProps({
    colors: Object,
    errors: Object,
});

const form = useForm({
    name: '',
    hexadecimal: '',
});

const submit = () => {
    form.post(route('admin.colors.store'), {
        onFinish: () => {
            form.reset();
            return redirect(route('admin.vitals.create'));
        },
    });
};
</script>
<template>
    <DivVitals title="Colores">
        <template #head>
            <form class="flex gap-4">
                <fieldset>
                    <input
                        v-model="form.name"
                        class="h-9 rounded-lg border-gray-300 bg-gray-200 py-3 text-sm text-black focus:border-gray-300 focus:ring-transparent dark:border-zinc-700 dark:bg-zinc-800 dark:text-white dark:focus:border-zinc-700"
                        type="text"
                        placeholder="Nombre"
                    />
                    <InputError v-if="errors?.name" class="block" :message="errors.name[0]" />
                </fieldset>
                <fieldset>
                    <input
                        v-model="form.hexadecimal"
                        class="h-9 rounded-lg border-gray-300 bg-gray-200 py-3 text-sm text-black focus:border-gray-300 focus:ring-transparent dark:border-zinc-700 dark:bg-zinc-800 dark:text-white dark:focus:border-zinc-700"
                        type="text"
                        placeholder="Hexadecimal"
                    />
                    <InputError v-if="errors?.hexadecimal" class="block" :message="errors.hexadecimal[0]" />
                </fieldset>
                <ButtonRegisterAdmin @toggle="submit">Registrar</ButtonRegisterAdmin>
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
                <td class="flex h-12 items-center gap-2">
                    <div class="h-5 w-5 rounded-md" :style="'background-color: ' + '#' + color.hexadecimal"></div>
                    {{ color.name }}
                </td>
                <td class="">#{{ color.hexadecimal }}</td>
                <td class="">
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
