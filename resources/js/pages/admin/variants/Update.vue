<script setup>
import DialogModal from '@/components/DialogModal.vue';
import InputLabel from '@/components/InputLabel.vue';
import ButtonUpdateAdmin from '@/components/myComponents/ButtonUpdateAdmin.vue';
import Select from '@/components/Select.vue';
import TextInput from '@/components/TextInput.vue';
import { router, useForm } from '@inertiajs/vue3';
import { ref } from 'vue';

const open = ref(false);
const fileInput = ref(null);
const fileInputKey = ref(0);

const props = defineProps({
    product: String,
    variant: Object,
    colors: Array,
    sizes: Array,
    stickies: Array,
});

const preview = useForm({
    image: null,
    color: props.variant.characteristic.color_sticky.color.hexadecimal,
});

const form = useForm({
    sticky: props.variant.characteristic.color_sticky.sticky.id,
    color: props.variant.characteristic.color_sticky.color.id,
    size: props.variant.characteristic.size.id,
    image: props.variant.image,
    price: props.variant.price,
    stock: props.variant.stock,
    discount: props.variant.discount,
});

const toggleOpen = () => {
    open.value = !open.value;
    form.reset();
    preview.reset();
    fileInputKey.value++;
};

const submit = () => {
    if (!form.sticky || !form.color || !form.size || !form.price || !form.stock) {
        return alert('Todos los campos son requeridos');
    }
    router.post(route('admin.variants.update', props.variant.id), {
        forceFormData: true,
        ...form,
        _method: 'put',
    });
    toggleOpen();
    return redirect(route('admin.variants.create', props.product));
};

const handleColor = (id) => {
    preview.color = props.colors.find((color) => color.id === id).hexadecimal;
};

const handleImage = (e) => {
    form.image = e.target.files[0];
    preview.image = URL.createObjectURL(form.image);
};
</script>

<template>
    <ButtonUpdateAdmin @toggle="toggleOpen">Actualizar</ButtonUpdateAdmin>
    <DialogModal :show="open">
        <template #title>
            Actualizar variante <span class="block">#{{ variant.id }}</span>
        </template>
        <template #content>
            <form class="grid grid-cols-2 gap-4">
                <div class="row-span-3 overflow-hidden rounded-md">
                    <img
                        class="aspect-square"
                        v-if="form.image != variant.image"
                        :src="preview.image"
                        :alt="'Nueva imagen de la variante ' + variant.id"
                    />
                    <img class="aspect-square" v-else :src="variant.image" :alt="'Imagen actual de la variante ' + variant.id" />
                </div>
                <div class="flex flex-col gap-2">
                    <InputLabel for="image">Nueva imagen</InputLabel>
                    <TextInput
                        :key="fileInputKey"
                        ref="fileInput"
                        type="file"
                        name="imageUploaded"
                        accept="image/*"
                        id="imageUploaded"
                        class="h-9 rounded-lg border-gray-300 bg-gray-200 text-sm text-black focus:border-gray-300 focus:ring-transparent dark:border-zinc-700 dark:bg-zinc-800 dark:text-white dark:focus:border-zinc-700"
                        @change="handleImage"
                    />
                    <!-- <x-TextInput-error for="imageUploaded" /> -->
                </div>
                <div class="flex flex-col gap-2">
                    <InputLabel for="color">Color</InputLabel>
                    <div class="grid grid-cols-[16%_1fr] items-center justify-center gap-1">
                        <span
                            class="h-full w-full rounded-lg border border-gray-300 dark:border-zinc-700"
                            :style="'background-color: #' + preview.color"
                        ></span>
                        <Select
                            name="color"
                            id="color"
                            v-model="form.color"
                            @change="handleColor(form.color)"
                            class="h-9 w-full rounded-lg border-gray-300 bg-gray-200 text-sm text-black focus:border-gray-300 focus:ring-transparent dark:border-zinc-700 dark:bg-zinc-800 dark:text-white dark:focus:border-zinc-700"
                        >
                            <option v-for="color in colors" :key="color.id" :value="color.id">{{ color.name }}</option>
                        </Select>
                    </div>
                    <!-- <x-TextInput-error for="color" /> -->
                </div>
                <div class="flex flex-col gap-2">
                    <InputLabel for="sticky">Sticky</InputLabel>
                    <Select
                        name="sticky"
                        id="sticky"
                        v-model="form.sticky"
                        class="h-9 rounded-lg border-gray-300 bg-gray-200 text-sm text-black focus:border-gray-300 focus:ring-transparent dark:border-zinc-700 dark:bg-zinc-800 dark:text-white dark:focus:border-zinc-700"
                    >
                        <option v-for="sticky in stickies" :key="sticky.id" :value="sticky.id">{{ sticky.name }}</option>
                    </Select>
                    <!-- <x-TextInput-error for="sticky" /> -->
                </div>
                <div class="flex flex-col gap-2">
                    <InputLabel for="size">Talla</InputLabel>
                    <Select
                        name="size"
                        id="size"
                        v-model="form.size"
                        class="h-9 rounded-lg border-gray-300 bg-gray-200 text-sm text-black focus:border-gray-300 focus:ring-transparent dark:border-zinc-700 dark:bg-zinc-800 dark:text-white dark:focus:border-zinc-700"
                    >
                        <option v-for="size in sizes" :key="size.id" :value="size.id">{{ size.name }}</option>
                    </Select>
                    <!-- <x-TextInput-error for="size" /> -->
                </div>
                <div class="flex flex-col gap-2">
                    <InputLabel for="price">Precio</InputLabel>
                    <TextInput
                        v-model="form.price"
                        type="number"
                        id="price"
                        class="h-9 rounded-lg border-gray-300 bg-gray-200 text-sm text-black focus:border-gray-300 focus:ring-transparent dark:border-zinc-700 dark:bg-zinc-800 dark:text-white dark:focus:border-zinc-700"
                    />
                    <!-- <x-TextInput-error for="price" /> -->
                </div>
                <div class="flex flex-col gap-2">
                    <InputLabel for="stock">Cantidad</InputLabel>
                    <TextInput
                        v-model="form.stock"
                        type="number"
                        id="stock"
                        class="h-9 rounded-lg border-gray-300 bg-gray-200 text-sm text-black focus:border-gray-300 focus:ring-transparent dark:border-zinc-700 dark:bg-zinc-800 dark:text-white dark:focus:border-zinc-700"
                    />
                    <!-- <x-TextInput-error for="stock" /> -->
                </div>
                <div class="flex flex-col gap-2">
                    <InputLabel for="discount">Descuento</InputLabel>
                    <TextInput
                        v-model="form.discount"
                        type="number"
                        id="discount"
                        class="h-9 rounded-lg border-gray-300 bg-gray-200 text-sm text-black focus:border-gray-300 focus:ring-transparent dark:border-zinc-700 dark:bg-zinc-800 dark:text-white dark:focus:border-zinc-700"
                    />
                    <!-- <x-TextInput-error for="discount" /> -->
                </div>
            </form>
        </template>
        <template #footer>
            <button @click="(form.reset(), preview.reset(), fileInputKey++)" class="mr-2 rounded-md bg-blue-800 px-2 py-2 text-white">
                Restablecer campos
            </button>
            <button @click="toggleOpen" class="mr-2 rounded-md bg-red-800 px-2 py-2 text-white">Cancelar</button>
            <button @click="submit" class="rounded-md bg-[#DE5976] px-2 py-2 text-white">Actualizar</button>
        </template>
    </DialogModal>
</template>
