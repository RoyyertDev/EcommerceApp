<script setup>
import DialogModal from '@/components/DialogModal.vue';
import InputLabel from '@/components/InputLabel.vue';
import ButtonRegisterAdmin from '@/components/myComponents/ButtonRegisterAdmin.vue';
import Select from '@/components/Select.vue';
import TextInput from '@/components/TextInput.vue';
import { useForm } from '@inertiajs/vue3';
import { ref } from 'vue';

const open = ref(false);

const toggleOpen = () => {
    open.value = !open.value;
    form.reset();
    colorView2.value = null;
};

const colorView2 = ref(null);

const form = useForm({
    sticky: '',
    color: '',
    size: '',
    image: null,
    price: '',
    stock: '',
    discount: '',
    promotion: false,
});

const props = defineProps({
    stickies: Array,
    colors: Array,
    sizes: Array,
    product: Array,
});

const submit = () => {
    // if (!form.sticky || !form.color || !form.size || !form.price || !form.stock) {
    //     return alert('Todos los campos son requeridos');
    // }
    form.post(route('admin.variants.store', props.product.id), {
        onFinish: () => {
            toggleOpen();
            return redirect(route('admin.variants.create', props.product.id));
        },
    });
};

const handleColor = (id) => {
    colorView2.value = props.colors.find((color) => color.id === id).hexadecimal;
};
</script>

<template>
    <ButtonRegisterAdmin @toggle="toggleOpen">Registar variante</ButtonRegisterAdmin>
    <DialogModal :show="open">
        <template #title> Registrar variante del producto {{ product.name }}</template>
        <template #content>
            <form class="grid grid-cols-3 gap-4">
                <div class="flex flex-col gap-2">
                    <InputLabel for="sticky">Sticky</InputLabel>
                    <Select
                        v-model="form.sticky"
                        name="sticky"
                        id="sticky"
                        class="h-9 rounded-lg border-gray-300 bg-gray-200 text-sm text-black focus:border-gray-300 focus:ring-transparent dark:border-zinc-700 dark:bg-zinc-800 dark:text-white dark:focus:border-zinc-700"
                    >
                        <option v-for="sticky in stickies" :value="sticky.id" :key="sticky.id">{{ sticky.name }}</option>
                    </Select>
                </div>
                <div class="flex flex-col gap-2">
                    <InputLabel for="color">Color</InputLabel>
                    <div class="grid grid-cols-[16%_1fr] items-center justify-center gap-1">
                        <span
                            class="h-full w-full rounded-lg border border-gray-300 dark:border-zinc-700"
                            :style="'background-color:' + '#' + colorView2"
                        ></span>
                        <Select
                            v-model="form.color"
                            @change="handleColor(form.color)"
                            name="color"
                            id="color"
                            class="h-9 w-full rounded-lg border-gray-300 bg-gray-200 text-sm text-black focus:border-gray-300 focus:ring-transparent dark:border-zinc-700 dark:bg-zinc-800 dark:text-white dark:focus:border-zinc-700"
                        >
                            <option v-for="color in colors" :key="color.id" :value="color.id">
                                {{ color.name }}
                            </option>
                        </Select>
                    </div>
                </div>
                <div class="flex flex-col gap-2">
                    <InputLabel for="sizes" class="">Talla</InputLabel>
                    <Select
                        v-model="form.size"
                        name="sizes"
                        id="sizes"
                        class="h-9 w-full rounded-lg border-gray-300 bg-gray-200 text-sm text-black focus:border-gray-300 focus:ring-transparent dark:border-zinc-700 dark:bg-zinc-800 dark:text-white dark:focus:border-zinc-700"
                    >
                        <option v-for="size in sizes" :key="size.id" :value="size.id">{{ size.name }}</option>
                    </Select>
                </div>
                <div class="flex flex-col gap-2">
                    <InputLabel for="imagen">Imagen</InputLabel>
                    <TextInput
                        @change="form.image = $event.target.files[0]"
                        type="file"
                        name="imagen"
                        id="imagen"
                        class="h-9 rounded-lg border-gray-300 bg-gray-200 text-sm text-black focus:border-gray-300 focus:ring-transparent dark:border-zinc-700 dark:bg-zinc-800 dark:text-white dark:focus:border-zinc-700"
                    />
                </div>
                <div class="flex flex-col gap-2">
                    <InputLabel for="price">Precio</InputLabel>
                    <TextInput
                        v-model="form.price"
                        type="number"
                        name="price"
                        id="price"
                        class="h-9 rounded-lg border-gray-300 bg-gray-200 text-sm text-black focus:border-gray-300 focus:ring-transparent dark:border-zinc-700 dark:bg-zinc-800 dark:text-white dark:focus:border-zinc-700"
                    />
                </div>
                <div class="flex flex-col gap-2">
                    <InputLabel for="stock">Cantidad</InputLabel>
                    <TextInput
                        v-model="form.stock"
                        type="number"
                        name="stock"
                        id="stock"
                        class="h-9 rounded-lg border-gray-300 bg-gray-200 text-sm text-black focus:border-gray-300 focus:ring-transparent dark:border-zinc-700 dark:bg-zinc-800 dark:text-white dark:focus:border-zinc-700"
                    />
                </div>
                <div class="flex flex-col gap-2">
                    <InputLabel for="discount">Descuento</InputLabel>
                    <TextInput
                        v-model="form.discount"
                        type="number"
                        name="discount"
                        id="discount"
                        class="h-9 rounded-lg border-gray-300 bg-gray-200 text-sm text-black focus:border-gray-300 focus:ring-transparent dark:border-zinc-700 dark:bg-zinc-800 dark:text-white dark:focus:border-zinc-700"
                    />
                </div>
                <div class="flex flex-col gap-2">
                    <InputLabel for="promocion">Promoción</InputLabel>
                    <TextInput
                        @change="form.promotion = !form.promotion"
                        type="checkbox"
                        name="promocion"
                        id="promocion"
                        class="cursor-pointer rounded-sm border-gray-300 bg-gray-200 text-[#DE5976] focus:border-gray-300 focus:ring-transparent dark:border-zinc-700 dark:bg-zinc-800 dark:focus:border-zinc-700"
                    />
                </div>
            </form>
        </template>
        <template #footer>
            <button @click="(form.reset(), (colorView2 = null))" class="mr-2 rounded-md bg-blue-800 px-2 py-2 text-white">Limpiar campos</button>
            <button @click="toggleOpen" class="mr-2 rounded-md bg-red-800 px-2 py-2 text-white">Cancelar</button>
            <button @click="submit" class="rounded-md bg-[#DE5976] px-2 py-2 text-white">Registrar</button>
        </template>
    </DialogModal>
</template>
