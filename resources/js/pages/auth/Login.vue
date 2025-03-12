<script setup>
import { Head, Link, useForm } from '@inertiajs/vue3';
import AuthenticationCard from '@/components/AuthenticationCard.vue';
import AuthenticationCardLogo from '@/components/AuthenticationCardLogo.vue';
import Checkbox from '@/components/Checkbox.vue';
import InputError from '@/components/InputError.vue';
import InputLabel from '@/components/InputLabel.vue';
import PrimaryButton from '@/components/PrimaryButton.vue';
import TextInput from '@/components/TextInput.vue';
import LandingLayout from '@/layouts/landing/LandingLayout.vue';

defineProps({
    canResetPassword: Boolean,
    status: String,
    canLogin: Boolean,
});

const form = useForm({
    email: '',
    password: '',
    remember: false,
});

const submit = () => {
    form.transform(data => ({
        ...data,
        remember: form.remember ? 'on' : '',
    })).post(route('login'), {
        onFinish: () => form.reset('password'),
    });
};
</script>

<template>
    <Head title="Login" />
<LandingLayout :canLogin="canLogin">
    <AuthenticationCard :width="'max-w-md w-full'">
        <template #logo>
            <AuthenticationCardLogo />
        </template>

        <div v-if="status" class="mb-4 font-medium text-sm text-green-600">
            {{ status }}
        </div>
        <form class="p-6 space-y-6" method="POST" action="/login">
            <h1 class="text-xl font-bold tracking-tight leading-tight">Inicia sesión en tu cuenta</h1>
            <div>
                <InputLabel for="email" value="Correo electronico" />
                <TextInput id="email" placeholder="jirehimport@gmail.com" class="block mt-1 w-full" type="email" name="email" required autofocus autocomplete="username" />
            </div>

            <div class="mt-4">
                <InputLabel for="password" value="Contraseña" />
                <TextInput id="password" placeholder="••••••••" class="block mt-1 w-full" type="password" name="password" required autocomplete="current-password" />
            </div>

            <div class="flex items-center justify-between mt-4">
                <label for="remember_me" class="flex items-center cursor-pointer">
                    <Checkbox id="remember_me" name="remember" />
                    <span class="ms-2 text-sm text-gray-600 dark:text-gray-400">Recordarme</span>
                </label>
                <Link v-if="canResetPassword" class="hover:underline text-sm text-gray-600 dark:text-gray-400 hover:text-[#DE5976]"  :href="route('password.request')">
                    Recuperar contraseña
                </Link>
            </div>
            <PrimaryButton>
                Iniciar sesión
            </PrimaryButton>
            <p class="text-sm font-light text-gray-400">
                ¿No se ha registrado? <Link  :href="route('register')" class="hover:underline font-semibold text-[#DE5976]">Registrarse</Link>
            </p>
        </form>
    </AuthenticationCard>
</LandingLayout>
</template>