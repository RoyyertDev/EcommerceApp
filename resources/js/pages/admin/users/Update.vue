<script setup>
import DialogModal from '@/components/DialogModal.vue';
import InputLabel from '@/components/InputLabel.vue';
import Select from '@/components/Select.vue';
import TextInput from '@/components/TextInput.vue';
import ButtonUpdateAdmin from '@/components/myComponents/ButtonUpdateAdmin.vue';
import { useForm } from '@inertiajs/vue3';
import { ref } from 'vue';

const open = ref(false);

const toggleOpen = () => {
    open.value = !open.value;
    return form.reset()
};

const form = useForm({
    names: '',
    surnames: '',
    identification_document: '',
    email: '',
    gender: '',
    country: '',
    province: '',
    city: '',
    zip_code: '',
    site_reference: '',
    phone: '',
    terms: false,
});

const submit = () => {
        if (!form.names || !form.surnames || !form.identification_document || !form.email) {
            return alert('Todos los campos son requeridos');
        }
        form.post(route('admin.users.store'), {
            onFinish: () => {
                toggleOpen();
                return redirect(route('admin.users.create')); // Redirecciona a la página de creación de usuarios
            },
        });
}


</script>
<template>
    <ButtonUpdateAdmin @click="toggleOpen">Actualizar</ButtonUpdateAdmin>
    <DialogModal :show="open">
        <template #title>
            {{ names + ' ' + surnames }}
        </template>
        <template #content>
            <form class="grid grid-cols-2 gap-4">
                <div class="flex flex-col gap-2" >
                    <InputLabel for="names" />Nombres
                    <TextInput v-model="form.names" type="text" id="names"
                        class="bg-gray-200 dark:bg-zinc-800 rounded-lg border-gray-300 dark:border-zinc-700 h-9 text-black dark:text-white text-sm focus:border-gray-300 dark:focus:border-zinc-700 focus:ring-transparent"
                        placeholder="eg.  Lo Esencial Shop VE" />
                    <!-- <x-TextInput-error for="names" /> -->
                </div>
                <div class="flex flex-col gap-2">
                    <InputLabel for="surnames" />Apellidos
                    <TextInput v-model="form.surnames" type="text" id="surnames"
                        class="bg-gray-200 dark:bg-zinc-800 rounded-lg border-gray-300 dark:border-zinc-700 h-9 text-black dark:text-white text-sm focus:border-gray-300 dark:focus:border-zinc-700 focus:ring-transparent"
                        placeholder="e.g Compromiso Calidad" />
                    <!-- <x-TextInput-error for="surnames" /> -->
                </div>
                <div class="flex flex-col gap-2">
                    <InputLabel for="identification_document" />Documento de Identificación
                    <TextInput v-model="form.identification_document" type="text" id="identification_document"
                        class="bg-gray-200 dark:bg-zinc-800 rounded-lg border-gray-300 dark:border-zinc-700 h-9 text-black dark:text-white text-sm focus:border-gray-300 dark:focus:border-zinc-700 focus:ring-transparent"
                        placeholder="DNI o NIE" />
                    <!-- <x-TextInput-error for="identification_document" />  -->
                </div>
                <div class="flex flex-col gap-2">
                    <InputLabel for="email" />Correo electronico
                    <TextInput v-model="form.email" type="text" id="email"
                        class="bg-gray-200 dark:bg-zinc-800 rounded-lg border-gray-300 dark:border-zinc-700 h-9 text-black dark:text-white text-sm focus:border-gray-300 dark:focus:border-zinc-700 focus:ring-transparent"
                        placeholder="jirehimport@jirehimport.com" />
                    <!-- <x-TextInput-error for="email" /> -->
                </div>
                <div class="flex flex-col gap-2">
                    <InputLabel for="gender" />Sexo
                    <Select v-model="form.gender" id="gender"
                        class="cursor-pointer bg-gray-200 dark:bg-zinc-800 rounded-lg border-gray-300 dark:border-zinc-700 h-9 text-black dark:text-white text-sm focus:border-gray-300 dark:focus:border-zinc-700 focus:ring-transparent">
                        <option value="0">Masculino</option>
                        <option value="1">Femenino</option>
                    </Select>
                    <!-- <x-TextInput-error for="gender" /> -->
                </div>
                <div class="flex flex-col gap-2">
                    <InputLabel for="country" />País
                    <Select v-model="form.country" id="country"
                        class="cursor-pointer bg-gray-200 dark:bg-zinc-800 rounded-lg border-gray-300 dark:border-zinc-700 h-9 text-black dark:text-white text-sm focus:border-gray-300 dark:focus:border-zinc-700 focus:ring-transparent">
                        @foreach (countries as country)
                        @if (country['country_name'] === user->detail->country)
                        <option v-for="(country, index) in contries" Selected :key="index"
                            :value="country['country_name']">{{ country['country_name'] }}</option>
                        @else
                        <option v-for="(country, index) in contries" :value="country['country_name']">{{
                            country['country_name'] }}</option>
                    </Select>
                    <!-- <x-TextInput-error for="country" /> -->
                </div>
                <div class="flex flex-col gap-2">
                    <InputLabel for="province" />Provincia
                    <Select v-model="form.province" id="province"
                        class="cursor-pointer bg-gray-200 dark:bg-zinc-800 rounded-lg border-gray-300 dark:border-zinc-700 h-9 text-black dark:text-white text-sm focus:border-gray-300 dark:focus:border-zinc-700 focus:ring-transparent">
                        <option Selected disabled value="">Seleccione</option>
                        <option v-for="(province, index) in provinces" :key="index" :value="province['state_name']">{{
                            province['state_name'] }}</option>
                    </Select>
                    <!-- <x-TextInput-error for="province" /> -->
                </div>
                <div class="flex flex-col gap-2">
                    <InputLabel for="city" />Ciudad
                    <Select v-model="form.city" id="city"
                        class="cursor-pointer bg-gray-200 dark:bg-zinc-800 rounded-lg border-gray-300 dark:border-zinc-700 h-9 text-black dark:text-white text-sm focus:border-gray-300 dark:focus:border-zinc-700 focus:ring-transparent">
                        <option Selected disabled value="">Seleccione</option>
                        <option v-for="(city, index) in cities" :key="index" :value="city['city_name']">{{
                            city['city_name'] }}</option>
                    </Select>
                    <!-- <x-TextInput-error for="city" /> -->
                </div>
                <div class="flex flex-col gap-2">
                    <InputLabel for="zip_code" />Código Postal
                    <TextInput v-model="form.zip_code" type="text" id="zip_code"
                        class="bg-gray-200 dark:bg-zinc-800 rounded-lg border-gray-300 dark:border-zinc-700 h-9 text-black dark:text-white text-sm focus:border-gray-300 dark:focus:border-zinc-700 focus:ring-transparent"
                        placeholder="Código Postal" />
                    <!-- <x-TextInput-error for="zip_code" /> -->
                </div>
                <div class="flex flex-col gap-2">
                    <InputLabel for="site_reference" />Referencia
                    <TextInput v-model="form.site_reference" type="text" id="site_reference"
                        class="bg-gray-200 dark:bg-zinc-800 rounded-lg border-gray-300 dark:border-zinc-700 h-9 text-black dark:text-white text-sm focus:border-gray-300 dark:focus:border-zinc-700 focus:ring-transparent"
                        placeholder="Lugar de referencia" />
                    <!-- <x-TextInput-error for="site_reference" /> -->
                </div>
                <div class="flex flex-col gap-2">
                    <InputLabel for="phone" />Teléfono
                    <div class="grid grid-cols-[16%_1fr] items-center">
                        <TextInput readonly v-model="form.phoneCode" type="text" id="phoneCode"
                            class="bg-gray-200 dark:bg-zinc-800 rounded-l-lg border-gray-300 dark:border-zinc-700 h-9 text-black dark:text-white text-sm focus:border-gray-300 dark:focus:border-zinc-700 focus:ring-transparent"
                            placeholder="+1" />
                        <TextInput v-model="form.phone" type="number" id="phone"
                            class="bg-gray-200 dark:bg-zinc-800 rounded-r-lg border-gray-300 dark:border-zinc-700 h-9 text-black dark:text-white text-sm focus:border-gray-300 dark:focus:border-zinc-700 focus:ring-transparent"
                            placeholder="Teléfono" />
                    </div>
                    <!-- Mensajes de error alineados debajo de los campos -->
                    <div class="grid grid-cols-2 gap-2 mt-1">
                        <!--  <x-TextInput-error for="phoneCode" class="col-start-1 text-xs text-red-500" />
                        <x-TextInput-error for="phone" class="col-start-2 text-xs text-red-500" /> -->
                    </div>
                </div>
            </form>
        </template>
        <template #footer>
            <button @click="form.reset()"  class="rounded-md bg-blue-800 text-white py-2 px-2 mr-2">Restablecer
                campos</button>
            <button @click="toggleOpen" class="rounded-md bg-red-800 text-white py-2 px-2 mr-2">Cancelar</button>
            <button @click="submit" class="rounded-md bg-[#DE5976] text-white py-2 px-2">Editar</button>
        </template>
    </DialogModal>
</template>