<script setup>
import ButtonRegisterAdmin from '@/components/myComponents/ButtonRegisterAdmin.vue';
import DialogModal from '@/components/DialogModal.vue';
import InputLabel from '@/components/InputLabel.vue';
import TextInput from '@/components/TextInput.vue';
import Select from '@/components/Select.vue';
import PrimaryButton from '@/components/PrimaryButton.vue';

import { useForm } from '@inertiajs/vue3';
import { ref } from 'vue';

const open = ref(false);
const formCard = ref(0);

const toggleOpen = () => {
    open.value = !open.value;
    form.reset();
};

const form = useForm({
    names: '',
    surnames: '',
    identification_document: '',
    email: '',
    password: '',
    password_confirmation: '',
    gender: '',
    terms: '',
});

const submit = () => {
    if(formCard.value === 1) {
        if (!form.names || !form.surnames || !form.identification_document || !form.email ) {
            return alert('Todos los campos son requeridos');
        }
        form.post(route('admin.users.store'), {
            onFinish: () => {
                toggleOpen();
                return redirect(route('admin.products.create')); // Redirecciona a la página de creación de usuarios
            },
        });
    } else {
        formCard.value = 1;
    }
};
</script>

<template>
    <ButtonRegisterAdmin @toggle="toggleOpen"> Registrar usuarios</ButtonRegisterAdmin>
    <DialogModal :show="open">
        <template #title>Registrar usuarios</template>
        <template #content>
            <form class="flex flex-col gap-4">
                <div class="flex items-center space-x-1">
                    <button @click="formCard = 0" type="button"
                        class="rounded-full transition-all duration-300 ease-in-out"
                        :class="{ 'h-2 w-2 bg-[#DE5976]': formCard === 0, 'h-2 w-2 bg-gray-100': formCard === 1 }"></button>
                    <button @click="formCard = 1" type="button"
                        class="rounded-full transition-all duration-300 ease-in-out"
                        :class="{ 'h-1.5 w-1.5 bg-gray-100': formCard === 0, 'h-2 w-2 bg-[#DE5976]': formCard === 1 }"></button>
                </div>
                <div class="overflow-hidden">
                <div class="flex transition-all duration-500 ease-in-out"
                    :style="{ transform: `translateX(-${formCard * 100}%)` }">
                    <fieldset class="grid w-full shrink-0 grid-cols-2 gap-x-4 gap-y-6">
                        <div class="flex flex-col gap-2">
                            <InputLabel for="names" value="Nombre" />
                            <TextInput v-model="form.names" type="text" id="names"
                                class="h-9 rounded-lg border-gray-300 bg-gray-200 text-sm text-black focus:border-gray-300 focus:ring-transparent dark:border-zinc-700 dark:bg-zinc-800 dark:text-white dark:focus:border-zinc-700"
                                placeholder="eg.  Lo Esencial Shop VE" />
                            <!-- <x-TextInput-error for="names" /> -->
                        </div>
                        <div class="flex flex-col gap-2">
                            <InputLabel for="surnames" value="Apellido" />
                            <TextInput v-model="form.surnames" type="text" id="surnames"
                                class="h-9 rounded-lg border-gray-300 bg-gray-200 text-sm text-black focus:border-gray-300 focus:ring-transparent dark:border-zinc-700 dark:bg-zinc-800 dark:text-white dark:focus:border-zinc-700"
                                placeholder="e.g Compromiso Calidad" />
                            <!-- <x-TextInput-error for="surnames" /> -->
                        </div>
                        <div class="flex flex-col gap-2">
                            <InputLabel for="identification_document" value="Doc. Identificación" />
                            <TextInput v-model="form.identification_document" id="identification_document" type="text"
                                class="h-9 rounded-lg border-gray-300 bg-gray-200 text-sm text-black focus:border-gray-300 focus:ring-transparent dark:border-zinc-700 dark:bg-zinc-800 dark:text-white dark:focus:border-zinc-700"
                                placeholder="DNI o NIE" />
                            <!-- <x-TextInput-error for="identification_document" /> -->
                        </div>
                        <div class="flex flex-col gap-2">
                            <InputLabel for="email" value="Correo" />
                            <TextInput v-model="form.email" type="email" id="email"
                                class="h-9 rounded-lg border-gray-300 bg-gray-200 text-sm text-black focus:border-gray-300 focus:ring-transparent dark:border-zinc-700 dark:bg-zinc-800 dark:text-white dark:focus:border-zinc-700"
                                placeholder="jirehimport@jirehimport.com" />
                            <!-- <x-TextInput-error for="email" /> -->
                        </div>
                        <div class="flex flex-col gap-2">
                            <InputLabel for="password" value="Confirmar contraseña" />
                            <TextInput v-model="form.password" type="password" id="password"
                                class="bg-gray-200 dark:bg-zinc-800 rounded-lg border-gray-300 dark:border-zinc-700 h-9 text-black dark:text-white text-sm focus:border-gray-300 dark:focus:border-zinc-700 focus:ring-transparent"
                                placeholder="******" />
                        </div>
                        <!-- <x-TextInput-error for="password" /> -->
                        <div class="flex flex-col gap-2">
                            <InputLabel for="password_confirmation" value="Confirmar contraseña" />
                            <TextInput v-model="form.password_confirmation" placeholder="••••••••"
                                id="password_confirmation"
                                class="bg-gray-200 dark:bg-zinc-800 rounded-lg border-gray-300 dark:border-zinc-700 h-9 text-black dark:text-white text-sm focus:border-gray-300 dark:focus:border-zinc-700 focus:ring-transparent"
                                type="password" name="password_confirmation" />
                        </div>
                        <div class="flex flex-col gap-2">
                            <InputLabel for="gender" value="Sexo" />
                            <Select v-model="form.gender" id="gender"
                                class="cursor-pointer bg-gray-200 dark:bg-zinc-800 rounded-lg border-gray-300 dark:border-zinc-700 h-9 text-black dark:text-white text-sm focus:border-gray-300 dark:focus:border-zinc-700 focus:ring-transparent">
                                <option value="0">Masculino</option>
                                <option value="1">Femenino</option>
                            </Select>
                        </div>
                        <!-- <x-TextInput-error for="gender" /> -->
                    </fieldset>
                    <fieldset class="grid w-full shrink-0 grid-cols-2 gap-x-4 gap-y-6">
                        <div>
                            <InputLabel for="country" value="Pais" />
                            <Select v-model="form.country" name="country" id="country" class="h-9 cursor-pointer rounded-lg border-gray-300 bg-gray-200 text-sm text-black focus:border-gray-300 focus:ring-transparent dark:border-zinc-700 dark:bg-zinc-800 dark:text-white dark:focus:border-zinc-700"> </Select>
                        </div>
                        <div>
                            <InputLabel for="province" value="Estado" />
                            <Select v-model="form.province" name="province" id="province" class="h-9 cursor-pointer rounded-lg border-gray-300 bg-gray-200 text-sm text-black focus:border-gray-300 focus:ring-transparent dark:border-zinc-700 dark:bg-zinc-800 dark:text-white dark:focus:border-zinc-700"> </Select>
                        </div>
                        <div>
                            <InputLabel for="city" value="Ciudad" />
                            <Select v-model="form.city" name="city" id="city" class="h-9 cursor-pointer rounded-lg border-gray-300 bg-gray-200 text-sm text-black focus:border-gray-300 focus:ring-transparent dark:border-zinc-700 dark:bg-zinc-800 dark:text-white dark:focus:border-zinc-700"    > </Select>
                        </div>
                        <div>
                            <InputLabel for="zip_code" value="Codigo postal" />
                            <TextInput v-model="form.zip_code" placeholder="Codigo postal" id="zip_code"
                                class="mt-1 block w-full" type="text" name="zip_code" required
                                autocomplete="zip_code" />
                        </div>
                        <div>
                            <InputLabel for="site_reference" value="Lugar de refencia" />
                            <TextInput v-model="form.site_reference" placeholder="Lugar de refencia" id="site_reference"
                                class="mt-1 block w-full" type="text" name="site_reference" required
                                autocomplete="name" />
                        </div>
                        <div>
                            <InputLabel for="phone" value="Telefono" />
                            <div class="grid grid-cols-[15%_1fr] items-center gap-2">
                                <TextInput v-model="form.phone" placeholder="+1" readonly id="phoneCode"
                                class="h-9 rounded-r-lg border-gray-300 bg-gray-200 text-sm text-black focus:border-gray-300 focus:ring-transparent dark:border-zinc-700 dark:bg-zinc-800 dark:text-white dark:focus:border-zinc-700" type="text" name="phoneCode" required
                                    autocomplete="phoneCode" />
                                <TextInput v-model="form.phone" placeholder="Telefono" id="phone"
                                class="h-9 rounded-r-lg border-gray-300 bg-gray-200 text-sm text-black focus:border-gray-300 focus:ring-transparent dark:border-zinc-700 dark:bg-zinc-800 dark:text-white dark:focus:border-zinc-700" type="number" name="phone" required
                                    autocomplete="phone" />
                            </div>
                        </div>
                    </fieldset>
                </div>
                </div>
            </form>
        </template>
        <template #footer>
            <button @click="form.reset()" class="mr-2 rounded-md bg-blue-800 px-2 py-2 text-white">Limpiar campos</button>
            <button @click="toggleOpen" class="mr-2 rounded-md bg-red-800 px-2 py-2 text-white">Cancelar</button>
            <button @click="formCard = 0" v-if="formCard === 1" class="rounded-md bg-[#DE5976] px-2 py-2 text-white">Anterior</button>
            <button @click="submit" class="rounded-md bg-[#DE5976] px-2 py-2 text-white">{{ formCard === 0 ? 'Siguiente' : 'Registrar' }}</button>
        </template>
    </DialogModal>
</template>