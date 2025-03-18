<script setup>
import ButtonRegisterAdmin from '@/components/myComponents/ButtonRegisterAdmin.vue';
import DialogModal from '@/components/DialogModal.vue';
import InputLabel from '@/components/InputLabel.vue';
import TextInput from '@/components/TextInput.vue';

import { useForm } from '@inertiajs/vue3';
import { ref } from 'vue';
import Password from '@/pages/settings/Password.vue';

const open = ref(false);

const toggleOpen = () =>{
    open.value = !open.value;
    form.reset();
};

const form = useForm({
  name: '',
  surnames: '',
  identification_document: '',
  email: '',
  password: '',
  gender: '',
  terms: '',
});

const submit = () => {
    /* if (!form.name || !form.surnames || !form.identification_document || !form.email || !form.phone) {
        return alert('Todos los campos son requeridos');
    } */
    form.post(route('admin.users.store'), {
        onFinish: () => {
            toggleOpen();
            return redirect(route('admin.users.create'));
        },
    });

};
</script>

<template>
    <ButtonRegisterAdmin @toggle="toggleOpen"> Registrar usuarios</ButtonRegisterAdmin>
      <DialogModal :show="open">
        <template #title>Registrar usuarios</template>
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
                    <InputLabel for="surnames" value="Apellido" />
                    <TextInput
                        v-model="form.surnames"
                        type="text"
                        id="surnames"
                        class="h-9 rounded-lg border-gray-300 bg-gray-200 text-sm text-black focus:border-gray-300 focus:ring-transparent dark:border-zinc-700 dark:bg-zinc-800 dark:text-white dark:focus:border-zinc-700"
                        placeholder="eg.  Lo Esencial Shop VE"
                    />
                    <!-- <x-TextInput-error for="surnames" /> -->
                </div>
                <div class="flex flex-col gap-2">
                    <InputLabel for="identification_document" value="Doc. Identificación" />
                    <TextInput
                        v-model="form.identification_document"
                        id="identification_document"
                        type="text"
                        class="h-9 rounded-lg border-gray-300 bg-gray-200 text-sm text-black focus:border-gray-300 focus:ring-transparent dark:border-zinc-700 dark:bg-zinc-800 dark:text-white dark:focus:border-zinc-700"
                        placeholder="eg.  Lo Esencial Shop VE"
                    />
                    <!-- <x-TextInput-error for="identification_document" /> -->
                </div>
                <div class="flex flex-col gap-2">
                    <InputLabel for="email" value="Correo" />
                    <TextInput
                        v-model="form.email"
                        type="email"
                        id="email"
                        class="h-9 rounded-lg border-gray-300 bg-gray-200 text-sm text-black focus:border-gray-300 focus:ring-transparent dark:border-zinc-700 dark:bg-zinc-800 dark:text-white dark:focus:border-zinc-700"
                        placeholder="DNI"
                    />
                    <!-- <x-TextInput-error for="email" /> -->
                </div>
                
                <div class="flex flex-col gap-2">
                    <InputLabel for="phone" value="Telefono" />
                    <TextInput
                        v-model="form.phone"
                        type="phoneCode"
                        id="phoneCode"
                        class="h-9 rounded-lg border-gray-300 bg-gray-200 text-sm text-black focus:border-gray-300 focus:ring-transparent dark:border-zinc-700 dark:bg-zinc-800 dark:text-white dark:focus:border-zinc-700"
                        placeholder="+58"
                    />
                    <!-- <x-TextInput-error for="phone" /> -->
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