<script setup>
import DialogModal from '@/components/DialogModal.vue';
import InputLabel from '@/components/InputLabel.vue';
import ButtonRegisterAdmin from '@/components/myComponents/ButtonRegisterAdmin.vue';
import Select from '@/components/Select.vue';
import TextInput from '@/components/TextInput.vue';
import { useForm } from '@inertiajs/vue3';
import { ref } from 'vue';

const open = ref(false);

const props = defineProps({
    types: Array,
    categories: Array,
    materials: Array,
});

const toggleOpen = () => {
    open.value = !open.value;
    form.reset();
};

const form = useForm({
    name: '',
    type_product_id: '',
    category_product_id: '',
    material_product_id: '',
    description: '',
});

const submit = () => {
    if (!form.name || !form.type_product_id || !form.category_product_id || !form.material_product_id || !form.description) {
        return alert('Todos los campos son requeridos');
    }
    form.post(route('admin.products.store'), {
        onFinish: () => {
            toggleOpen();
            return redirect(route('admin.products.create'));
        },
    });
};
</script>

<template>
    <ButtonRegisterAdmin @toggle="toggleOpen">Registar producto</ButtonRegisterAdmin>
    <DialogModal :show="open">
        <template #title>Registrar producto</template>
        <template #content>
            <form class="flex flex-col gap-4">
                <div class="flex flex-col gap-2">
                    <InputLabel for="name" value="Nombre" />
                    <TextInput
                        v-model="form.name"
                        type="text"
                        id="name"
                        class="h-9 rounded-lg border-gray-300 bg-gray-200 text-sm text-black focus:border-gray-300 focus:ring-transparent dark:border-zinc-700 dark:bg-zinc-800 dark:text-white dark:focus:border-zinc-700"
                        placeholder="eg.  Lo Esencial Shop VE"
                    />
                    <!-- <x-TextInput-error for="names" /> -->
                </div>
                <div class="flex flex-col gap-2">
                    <InputLabel for="type_product_id" value="Tipo" />
                    <Select
                        v-model="form.type_product_id"
                        id="type_product_id"
                        class="h-9 cursor-pointer rounded-lg border-gray-300 bg-gray-200 text-sm text-black focus:border-gray-300 focus:ring-transparent dark:border-zinc-700 dark:bg-zinc-800 dark:text-white dark:focus:border-zinc-700"
                    >
                        <option v-for="type in types" :value="type.id">{{ type.name }}</option>
                    </Select>
                    <!-- <x-TextInput-error for="type_product_id" /> -->
                </div>
                <div class="flex flex-col gap-2">
                    <InputLabel for="category_product_id" value="Categoria" />
                    <Select
                        v-model="form.category_product_id"
                        id="category_product_id"
                        class="h-9 cursor-pointer rounded-lg border-gray-300 bg-gray-200 text-sm text-black focus:border-gray-300 focus:ring-transparent dark:border-zinc-700 dark:bg-zinc-800 dark:text-white dark:focus:border-zinc-700"
                    >
                        <option v-for="category in categories" :value="category.id">{{ category.name }}</option>
                    </Select>
                    <!-- <x-TextInput-error for="category_product_id" /> -->
                </div>
                <div class="flex flex-col gap-2">
                    <InputLabel for="material_product_id" value="Material" />
                    <Select
                        v-model="form.material_product_id"
                        id="material_product_id"
                        class="h-9 cursor-pointer rounded-lg border-gray-300 bg-gray-200 text-sm text-black focus:border-gray-300 focus:ring-transparent dark:border-zinc-700 dark:bg-zinc-800 dark:text-white dark:focus:border-zinc-700"
                    >
                        <option v-for="material in materials" :value="material.id">{{ material.name }}</option>
                    </Select>
                    <!-- <x-TextInput-error for="material_product_id" /> -->
                </div>
                <div class="flex flex-col gap-2">
                    <InputLabel for="description" value="Descripción" />
                    <textarea
                        rows="4"
                        v-model="form.description"
                        name="description"
                        id="description"
                        class="rounded-lg border-gray-300 bg-gray-200 text-sm text-black focus:border-gray-300 focus:ring-transparent dark:border-zinc-700 dark:bg-zinc-800 dark:text-white dark:focus:border-zinc-700"
                        placeholder="e.g Compromiso Calidad"
                    ></textarea>
                    <!-- <x-TextInput-error for="description" /> -->
                </div>
            </form>
        </template>
        <template #footer>
            <button @click="form.reset()" class="mr-2 rounded-md bg-blue-800 px-2 py-2 text-white">Limpiar campos</button>
            <button @click="toggleOpen" class="mr-2 rounded-md bg-red-800 px-2 py-2 text-white">Cancelar</button>
            <button @click="submit" class="rounded-md bg-[#DE5976] px-2 py-2 text-white">Registrar</button>
        </template>
    </DialogModal>
</template>
