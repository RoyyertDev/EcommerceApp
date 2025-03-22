<script setup>
import DialogModal from '@/components/DialogModal.vue';
import InputLabel from '@/components/InputLabel.vue';
import Select from '@/components/Select.vue';
import TextInput from '@/components/TextInput.vue';
import ButtonUpdateAdmin from '@/components/myComponents/ButtonUpdateAdmin.vue';
import { useForm } from '@inertiajs/vue3';
import { ref } from 'vue';

const open = ref(false);

const props = defineProps({
    user: Object,
});

const toggleOpen = () => {
    open.value = !open.value;
    return form.reset();
};
const user = props.user;
const form = useForm({
    names: user.names,
    surnames: user.surnames,
    identification_document: user.identification_document,
    email: user.email,
    gender: user.gender,
});

const submit = () => {
    if (!form.names || !form.surnames || !form.identification_document || !form.email) {
        return alert('Todos los campos son requeridos');
    }
    form.put(route('admin.users.update', props.user.id), {
        onFinish: () => {
            toggleOpen();
            return redirect(route('admin.users.create')); // Redirecciona a la página de creación de usuarios
        },
    });
};
</script>
<template>
    <ButtonUpdateAdmin @click="toggleOpen">Actualizar</ButtonUpdateAdmin>
    <DialogModal :show="open">
        <template #title>
            {{ user.names + ' ' + user.surnames }}
        </template>
        <template #content>
            <form class="grid grid-cols-2 gap-4">
                <div class="flex flex-col gap-2">
                    <InputLabel for="names" />Nombres
                    <TextInput
                        v-model="form.names"
                        type="text"
                        id="names"
                        class="h-9 rounded-lg border-gray-300 bg-gray-200 text-sm text-black focus:border-gray-300 focus:ring-transparent dark:border-zinc-700 dark:bg-zinc-800 dark:text-white dark:focus:border-zinc-700"
                        placeholder="eg.  Lo Esencial Shop VE"
                    />
                    <!-- <x-TextInput-error for="names" /> -->
                </div>
                <div class="flex flex-col gap-2">
                    <InputLabel for="surnames" />Apellidos
                    <TextInput
                        v-model="form.surnames"
                        type="text"
                        id="surnames"
                        class="h-9 rounded-lg border-gray-300 bg-gray-200 text-sm text-black focus:border-gray-300 focus:ring-transparent dark:border-zinc-700 dark:bg-zinc-800 dark:text-white dark:focus:border-zinc-700"
                        placeholder="e.g Compromiso Calidad"
                    />
                    <!-- <x-TextInput-error for="surnames" /> -->
                </div>
                <div class="flex flex-col gap-2">
                    <InputLabel for="identification_document" />Documento de Identificación
                    <TextInput
                        v-model="form.identification_document"
                        type="text"
                        id="identification_document"
                        class="h-9 rounded-lg border-gray-300 bg-gray-200 text-sm text-black focus:border-gray-300 focus:ring-transparent dark:border-zinc-700 dark:bg-zinc-800 dark:text-white dark:focus:border-zinc-700"
                        placeholder="DNI o NIE"
                    />
                    <!-- <x-TextInput-error for="identification_document" />  -->
                </div>
                <div class="flex flex-col gap-2">
                    <InputLabel for="email" />Correo electronico
                    <TextInput
                        v-model="form.email"
                        type="text"
                        id="email"
                        class="h-9 rounded-lg border-gray-300 bg-gray-200 text-sm text-black focus:border-gray-300 focus:ring-transparent dark:border-zinc-700 dark:bg-zinc-800 dark:text-white dark:focus:border-zinc-700"
                        placeholder="jirehimport@jirehimport.com"
                    />
                    <!-- <x-TextInput-error for="email" /> -->
                </div>
                <div class="flex flex-col gap-2">
                    <InputLabel for="gender" />Sexo
                    <Select
                        v-model="form.gender"
                        id="gender"
                        class="h-9 cursor-pointer rounded-lg border-gray-300 bg-gray-200 text-sm text-black focus:border-gray-300 focus:ring-transparent dark:border-zinc-700 dark:bg-zinc-800 dark:text-white dark:focus:border-zinc-700"
                    >
                        <option value="0">Masculino</option>
                        <option value="1">Femenino</option>
                    </Select>
                    <!-- <x-TextInput-error for="gender" /> -->
                </div>
                <div class="flex flex-col gap-2">
                    <InputLabel for="country" />País
                    <Select
                        v-model="form.country"
                        id="country"
                        class="h-9 cursor-pointer rounded-lg border-gray-300 bg-gray-200 text-sm text-black focus:border-gray-300 focus:ring-transparent dark:border-zinc-700 dark:bg-zinc-800 dark:text-white dark:focus:border-zinc-700"
                    >
                        <option v-for="(country, index) in contries" :value="country['country_name']">{{ country['country_name'] }}</option>
                    </Select>
                    <!-- <x-TextInput-error for="country" /> -->
                </div>
                <div class="flex flex-col gap-2">
                    <InputLabel for="province" />Provincia
                    <Select
                        v-model="form.province"
                        id="province"
                        class="h-9 cursor-pointer rounded-lg border-gray-300 bg-gray-200 text-sm text-black focus:border-gray-300 focus:ring-transparent dark:border-zinc-700 dark:bg-zinc-800 dark:text-white dark:focus:border-zinc-700"
                    >
                        <option v-for="(province, index) in provinces" :key="index" :value="province['state_name']">
                            {{ province['state_name'] }}
                        </option>
                    </Select>
                    <!-- <x-TextInput-error for="province" /> -->
                </div>
                <div class="flex flex-col gap-2">
                    <InputLabel for="city" />Ciudad
                    <Select
                        v-model="form.city"
                        id="city"
                        class="h-9 cursor-pointer rounded-lg border-gray-300 bg-gray-200 text-sm text-black focus:border-gray-300 focus:ring-transparent dark:border-zinc-700 dark:bg-zinc-800 dark:text-white dark:focus:border-zinc-700"
                    >
                        <option v-for="(city, index) in cities" :key="index" :value="city['city_name']">{{ city['city_name'] }}</option>
                    </Select>
                    <!-- <x-TextInput-error for="city" /> -->
                </div>
                <div class="flex flex-col gap-2">
                    <InputLabel for="zip_code" />Código Postal
                    <TextInput
                        v-model="form.zip_code"
                        type="text"
                        id="zip_code"
                        class="h-9 rounded-lg border-gray-300 bg-gray-200 text-sm text-black focus:border-gray-300 focus:ring-transparent dark:border-zinc-700 dark:bg-zinc-800 dark:text-white dark:focus:border-zinc-700"
                        placeholder="Código Postal"
                    />
                    <!-- <x-TextInput-error for="zip_code" /> -->
                </div>
                <div class="flex flex-col gap-2">
                    <InputLabel for="site_reference" />Referencia
                    <TextInput
                        v-model="form.site_reference"
                        type="text"
                        id="site_reference"
                        class="h-9 rounded-lg border-gray-300 bg-gray-200 text-sm text-black focus:border-gray-300 focus:ring-transparent dark:border-zinc-700 dark:bg-zinc-800 dark:text-white dark:focus:border-zinc-700"
                        placeholder="Lugar de referencia"
                    />
                    <!-- <x-TextInput-error for="site_reference" /> -->
                </div>
                <div class="flex flex-col gap-2">
                    <InputLabel for="phone" />Teléfono
                    <div class="grid grid-cols-[16%_1fr] items-center">
                        <TextInput
                            readonly
                            v-model="form.phoneCode"
                            type="text"
                            id="phoneCode"
                            class="h-9 rounded-l-lg border-gray-300 bg-gray-200 text-sm text-black focus:border-gray-300 focus:ring-transparent dark:border-zinc-700 dark:bg-zinc-800 dark:text-white dark:focus:border-zinc-700"
                            placeholder="+1"
                        />
                        <TextInput
                            v-model="form.phone"
                            type="number"
                            id="phone"
                            class="h-9 rounded-r-lg border-gray-300 bg-gray-200 text-sm text-black focus:border-gray-300 focus:ring-transparent dark:border-zinc-700 dark:bg-zinc-800 dark:text-white dark:focus:border-zinc-700"
                            placeholder="Teléfono"
                        />
                    </div>
                    <!-- Mensajes de error alineados debajo de los campos -->
                    <div class="mt-1 grid grid-cols-2 gap-2">
                        <!--  <x-TextInput-error for="phoneCode" class="col-start-1 text-xs text-red-500" />
                        <x-TextInput-error for="phone" class="col-start-2 text-xs text-red-500" /> -->
                    </div>
                </div>
            </form>
        </template>
        <template #footer>
            <button @click="form.reset()" class="mr-2 rounded-md bg-blue-800 px-2 py-2 text-white">Restablecer campos</button>
            <button @click="toggleOpen" class="mr-2 rounded-md bg-red-800 px-2 py-2 text-white">Cancelar</button>
            <button @click="submit" class="rounded-md bg-[#DE5976] px-2 py-2 text-white">Editar</button>
        </template>
    </DialogModal>
</template>
