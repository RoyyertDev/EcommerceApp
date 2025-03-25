<script setup>
import DialogModal from '@/components/DialogModal.vue';
import InputLabel from '@/components/InputLabel.vue';
import ButtonUpdateAdmin from '@/components/myComponents/ButtonUpdateAdmin.vue';
import Select from '@/components/Select.vue';
import TextInput from '@/components/TextInput.vue';
import { useForm } from '@inertiajs/vue3';
import { ref } from 'vue';

const open = ref(false);

const props = defineProps({
    variant: Object,
});
const colorView2 = ref(null);

const form = useForm({
    sticky: props.variant.sticky,
    color: props.variant.color,
    size: props.variant.size,
    image: null,
    price: props.variant.price,
    stock: props.variant.stock,
    discount: props.variant.discount,
    promotion: props.variant.promotion,
});

const toggleOpen = () => {
    open.value = !open.value;
    form.reset();
};

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
</script>

<template>
    <ButtonUpdateAdmin @toggle="toggleOpen">Actualizar</ButtonUpdateAdmin>
    <DialogModal :show="open">
        <template #title>
            Actualizar variante <span class="block">#{{ variant.id }}</span>
        </template>
        <template #content>
            <form class="grid grid-cols-2 gap-4">
                <div class="row-span-4">
                    <!-- @if ($imageUploaded)
                    <img
                        src="{{ $imageUploaded->temporaryUrl() }}"
                        alt="{{ $variant->fk_characteristic }}"
                        class="mx-auto w-full rounded-md object-cover"
                    />
                    @else
                    <img
                        src="{{ Storage::url($variant->image) }}"
                        alt="{{ $variant->fk_characteristic }}"
                        class="mx-auto w-full rounded-md object-cover"
                    />
                    @endif -->
                </div>
                <div class="flex flex-col gap-2">
                    <InputLabel for="image">Imagen</InputLabel>
                    <TextInput
                        type="file"
                        name="imageUploaded"
                        accept="image/*"
                        id="imageUploaded"
                        class="h-9 rounded-lg border-gray-300 bg-gray-200 text-sm text-black focus:border-gray-300 focus:ring-transparent dark:border-zinc-700 dark:bg-zinc-800 dark:text-white dark:focus:border-zinc-700"
                        @change="form.imageUploaded"
                    />
                    <!-- <x-TextInput-error for="imageUploaded" /> -->
                </div>
                <div class="flex flex-col gap-2">
                    <InputLabel for="color">Color</InputLabel>
                    <div class="grid grid-cols-[16%_1fr] items-center justify-center gap-1">
                        <span
                            class="h-full w-full rounded-lg border border-gray-300 dark:border-zinc-700"
                            :style="'background-color: #' + colorView2"
                        ></span>
                        <Select
                            name="color"
                            id="color"
                            v-model="form.colorValue"
                            class="h-9 w-full rounded-lg border-gray-300 bg-gray-200 text-sm text-black focus:border-gray-300 focus:ring-transparent dark:border-zinc-700 dark:bg-zinc-800 dark:text-white dark:focus:border-zinc-700"
                        >
                            <option disabled selected value="">Seleccione</option>
                            <!-- @foreach ($colors as $colorFor) @if ($colorValue == $colorFor->id)
                            <option selected value="{{ $colorFor->id }}">{{ $colorFor->name }}</option>
                            @else
                            <option value="{{ $colorFor->id }}">{{ $colorFor->name }}</option>
                            @endif @endforeach -->
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
                        <option disabled selected value="">Seleccione</option>
                        <!-- @foreach ($stickies as $stickyFor) @if ($sticky == $stickyFor->id)
                        <option selected value="{{ $stickyFor->id }}">{{ $stickyFor->name }}</option>
                        @else
                        <option value="{{ $stickyFor->id }}">{{ $stickyFor->name }}</option>
                        @endif @endforeach -->
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
                        <option disabled selected value="">Seleccione</option>
                        <!-- @foreach ($sizes as $sizeFor) @if ($size == $sizeFor->id)
                        <option selected value="{{ $sizeFor->id }}">{{ $sizeFor->name }}</option>
                        @else
                        <option value="{{ $sizeFor->id }}">{{ $sizeFor->name }}</option>
                        @endif @endforeach -->
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
            <button @click="form.reset()" class="mr-2 rounded-md bg-blue-800 px-2 py-2 text-white">Restablecer campos</button>
            <button @click="toggleOpen" class="mr-2 rounded-md bg-red-800 px-2 py-2 text-white">Cancelar</button>
            <button @click="submit" class="rounded-md bg-[#DE5976] px-2 py-2 text-white">Actualizar</button>
        </template>
    </DialogModal>
</template>
