<script setup>
import DialogModal from '@/components/DialogModal.vue';

import { ref } from 'vue';

const open = ref(false);

const toggleOpen = () => {
    open.value = !open.value;
};

defineProps({
    user: Object
})
</script>
<template>
    <button @click="toggleOpen"
        class="text-green-600 flex items-center justify-center hover:scale-110 transition-all duration-300 gap-0.5" >
        <svg width="20px" height="20px" class="fill-green-600" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
            <path
                d="M.2 10a11 11 0 0 1 19.6 0A11 11 0 0 1 .2 10zm9.8 4a4 4 0 1 0 0-8 4 4 0 0 0 0 8zm0-2a2 2 0 1 1 0-4 2 2 0 0 1 0 4z" />
        </svg>
        Ver
    </button>
    <DialogModal :show="open">
        <template #title>
            {{ user.names + ' ' + user.surnames }}
        </template>
        <template #content>
            <div class="flex flex-col gap-2">
                <div class="flex flex-col gap-2">
                    Nombres: {{ user.names }}
                </div>
                <div class="flex flex-col gap-2">
                    Apellidos: {{ user.surnames }}
                </div>
                <div class="flex flex-col gap-2">
                    Documento de Identificación: {{ user.identification_document }}
                </div>
                <div class="flex flex-col gap-2">
                    Correo electronico: {{ user.email }}
                </div>
                <div>
                    Sexo: {{ user.sex }}
                </div>
                <div>
                    Teléfono: {{ user.detail.phone ?? '' }}
                </div>
                <div>
                    Rol:
                    <span v-if="user.detail.fk_role === 1">
                        Administrador
                    </span>
                    <span v-else-if="user.detail.fk_role === 0">
                        Cliente
                    </span>
                    <span v-else>
                        Sin Rol
                    </span>
                </div>
                <div>
                    País: {{ user.detail.country ?? '' }}
                </div>
                <div>
                    Provincia: {{ user.detail.province ?? '' }}
                </div>
                <div>
                    Ciudad: {{ user.detail.city ?? '' }}
                </div>
                <div>
                    Código Postal: {{ user.detail.zip_code ?? '' }}
                </div>
                <div>
                    Lugar de refencia: {{ user.detail.site_reference ?? '' }}
                </div>
            </div>
        </template>

        <template #footer>
            <button @click="toggleOpen" class="rounded-md bg-red-800 text-white py-2 px-2 mr-2">Cerrar</button>
        </template>
    </DialogModal>
</template>