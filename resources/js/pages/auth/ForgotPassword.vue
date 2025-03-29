<script setup>
import AuthenticationCard from '@/components/AuthenticationCard.vue';
import AuthenticationCardLogo from '@/components/AuthenticationCardLogo.vue';
import InputLabel from '@/components/InputLabel.vue';
import PrimaryButton from '@/components/PrimaryButton.vue';
import TextInput from '@/components/TextInput.vue';
import LandingLayout from '@/layouts/landing/LandingLayout.vue';
import { Head, useForm } from '@inertiajs/vue3';

defineProps({
    status: String,
    canLogin: Boolean,
});

const form = useForm({
    email: '',
});

const submit = () => {
    form.post(route('password.email'));
};
</script>

<template>
    <Head title="Forgot Password" />
    <LandingLayout :canLogin="canLogin">
        <div class="grid grid-cols-2">
            <img src="/img/new/xd.svg" class="m-auto" alt="JirehImport logo" />
            <AuthenticationCard :width="'max-w-md w-full'">
                <template #logo>
                    <AuthenticationCardLogo />
                </template>

                <div class="mb-4 px-6 pt-6 text-sm text-gray-600 dark:text-gray-400">
                    ¿Olvidaste tu contraseña? No hay problema. Solo indícanos tu dirección de correo electrónico y te enviaremos un enlace para
                    restablecer tu contraseña que te permitirá elegir una nueva.
                </div>

                <div v-if="status" class="mb-4 px-6 pt-0.5 text-sm font-medium text-green-600 dark:text-green-400">
                    {{ status }}
                </div>

                <form class="space-y-6 px-6 pb-6" @submit.prevent="submit">
                    <!-- @csrf -->
                    <div class="block">
                        <InputLabel for="email" value="Correo electronico" />
                        <TextInput
                            v-model="form.email"
                            id="email"
                            class="mt-1 block w-full"
                            type="email"
                            name="email"
                            required
                            autofocus
                            autocomplete="username"
                        />
                    </div>
                    <div class="mt-4 flex items-center justify-end">
                        <PrimaryButton> Enviar enlace de restablecimiento </PrimaryButton>
                    </div>
                </form>
            </AuthenticationCard>
        </div>
    </LandingLayout>
</template>
