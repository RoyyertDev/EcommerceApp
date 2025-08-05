<script setup>
import { Head, useForm } from '@inertiajs/vue3';
import AuthenticationCard from '@/components/AuthenticationCard.vue';
import AuthenticationCardLogo from '@/components/AuthenticationCardLogo.vue';
import InputLabel from '@/components/InputLabel.vue';
import PrimaryButton from '@/components/PrimaryButton.vue';
import TextInput from '@/components/TextInput.vue';

const props = defineProps({
    email: String,
    token: String,
    canLogin: Boolean,
});

const form = useForm({
    token: props.token,
    email: props.email,
    password: '',
    password_confirmation: '',
});

const submit = () => {
    form.post(route('password.update'), {
        onFinish: () => form.reset('password', 'password_confirmation'),
    });
};
</script>

<template>
    <Head title="Reset Password" />
    <AuthenticationCard>
        <template #logo>
            <AuthenticationCardLogo />
        </template>

        <form @submit.prevent="submit">
            <!--  @csrf -->

            <input type="hidden" name="token" />

            <div class="block">
                <InputLabel for="email" value="Email" />
                <TextInput id="email" class="mt-1 block w-full" type="email" name="email" required autofocus autocomplete="username" />
            </div>

            <div class="mt-4">
                <InputLabel for="password" value="Password" />
                <TextInput id="password" class="mt-1 block w-full" type="password" name="password" required autocomplete="new-password" />
            </div>

            <div class="mt-4">
                <InputLabel for="password_confirmation" value="Confirm Password" />
                <TextInput
                    id="password_confirmation"
                    class="mt-1 block w-full"
                    type="password"
                    name="password_confirmation"
                    required
                    autocomplete="new-password"
                />
            </div>

            <div class="mt-4 flex items-center justify-end">
                <PrimaryButton>
                    {{ Reset Password }}
                </PrimaryButton>
            </div>
        </form>
    </AuthenticationCard>
</template>
