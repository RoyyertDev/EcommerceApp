<script setup>
import { Head, useForm } from '@inertiajs/vue3';
import AuthenticationCard from '@/components/AuthenticationCard.vue';
import AuthenticationCardLogo from '@/components/AuthenticationCardLogo.vue';
import InputError from '@/components/InputError.vue';
import InputLabel from '@/components/InputLabel.vue';
import PrimaryButton from '@/components/PrimaryButton.vue';
import TextInput from '@/components/TextInput.vue';
import LandingLayout from '@/layouts/landing/LandingLayout.vue';

defineProps({
    status: String,
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
<LandingLayout>
    <AuthenticationCard :width="'max-w-md w-full'">
        <template #logo>
            <AuthenticationCardLogo />
        </template>

        <div class="pt-6 px-6 mb-4 text-sm text-gray-600 dark:text-gray-400">
            ¿Olvidaste tu contraseña? No hay problema. Solo indícanos tu dirección de correo electrónico y te enviaremos un enlace para restablecer tu contraseña que te permitirá elegir una nueva.
        </div>

        <div v-if="status" class="pt-0.5 px-6 mb-4 font-medium text-sm text-green-600 dark:text-green-400">
            {{ status }}
        </div>

        <form class="pb-6 px-6 space-y-6" @submit.prevent="submit">
            <!-- @csrf -->
            <div class="block">
                <InputLabel for="email" value="Correo electronico" />
                <TextInput v-model="form.email" id="email" class="block mt-1 w-full" type="email" name="email" required autofocus autocomplete="username" />
            </div>
            <div class="flex items-center justify-end mt-4">
                <PrimaryButton>
                    Enviar enlace de restablecimiento
                </PrimaryButton>
            </div>
        </form>
    </AuthenticationCard>
</LandingLayout>
</template>
