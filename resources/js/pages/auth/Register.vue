<script setup>
import AuthenticationCard from '@/components/AuthenticationCard.vue';
import AuthenticationCardLogo from '@/components/AuthenticationCardLogo.vue';
import InputLabel from '@/components/InputLabel.vue';
import PrimaryButton from '@/components/PrimaryButton.vue';
import Select from '@/components/Select.vue';
import TextInput from '@/components/TextInput.vue';
import LandingLayout from '@/layouts/landing/LandingLayout.vue';
import { Head, Link, useForm } from '@inertiajs/vue3';

defineProps({
    canLogin: Boolean,
});
const form = useForm({
    names: '',
    surnames: '',
    identification_document: '',
    email: '',
    password: '',
    password_confirmation: '',
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
    form.post(route('register'), {
        onFinish: () => form.reset('password', 'password_confirmation'),
    });
};
</script>

<template>
    <Head title="Register" />
    <LandingLayout :canLogin="canLogin">
        <AuthenticationCard :width="'w-3/5'">
            <template #logo>
                <AuthenticationCardLogo />
            </template>
            <form class="space-y-6 p-6" @submit.prevent="submit">
                <!-- @csrf -->
                <h1 class="text-xl font-bold leading-tight tracking-tight">Registrate para crear tu cuenta</h1>
                <fieldset class="grid max-h-[360px] grid-cols-2 gap-x-4 gap-y-6 overflow-y-auto">
                    <div>
                        <InputLabel for="names" value="Nombres" />
                        <TextInput
                            v-model="form.names"
                            placeholder="e.g. Lo Esencial Shop VE"
                            id="names"
                            class="mt-1 block w-full"
                            type="text"
                            name="names"
                            required
                            autofocus
                            autocomplete="names"
                        />
                    </div>
                    <div>
                        <InputLabel for="surnames" value="Apellidos" />
                        <TextInput
                            v-model="form.surnames"
                            placeholder="e.g. Compromiso Calidad"
                            id="surnames"
                            class="mt-1 block w-full"
                            type="text"
                            name="surnames"
                            required
                            autofocus
                            autocomplete="surnames"
                        />
                    </div>
                    <div>
                        <InputLabel for="identification_document" value="Documento de identificación" />
                        <TextInput
                            v-model="form.identification_document"
                            placeholder="DNI o NIE"
                            id="identification_document"
                            class="mt-1 block w-full"
                            type="text"
                            name="identification_document"
                            required
                            autofocus
                            autocomplete="identification_document"
                        />
                    </div>

                    <div>
                        <InputLabel for="email" value="Correo electronico" />
                        <TextInput
                            v-model="form.email"
                            placeholder="jirehimport@gmail.com"
                            id="email"
                            class="mt-1 block w-full"
                            type="email"
                            name="email"
                            required
                            autocomplete="email"
                        />
                    </div>

                    <div>
                        <InputLabel for="password" value="Contraseña" />
                        <TextInput
                            v-model="form.password"
                            placeholder="••••••••"
                            id="password"
                            class="mt-1 block w-full"
                            type="password"
                            name="password"
                            required
                            autocomplete="new-password"
                        />
                    </div>

                    <div>
                        <InputLabel for="password_confirmation" value="Confirmar contraseña" />
                        <TextInput
                            v-model="form.password_confirmation"
                            placeholder="••••••••"
                            id="password_confirmation"
                            class="mt-1 block w-full"
                            type="password"
                            name="password_confirmation"
                            required
                            autocomplete="new-password"
                        />
                    </div>
                    <div>
                        <InputLabel for="sex" value="Sexo" />
                        <Select v-model="form.gender" name="sex" id="sex">
                            <option value="0">Masculino</option>
                            <option value="1">Femenino</option>
                        </Select>
                    </div>
                    <!--Details-->
                    <!-- <div>
                        <InputLabel for="country" value="Pais" />
                        <Select v-model="form.country" name="country" id="country"> </Select>
                    </div>
                    <div>
                        <InputLabel for="province" value="Estado" />
                        <Select v-model="form.province" name="province" id="province"> </Select>
                    </div>
                    <div>
                        <InputLabel for="city" value="Ciudad" />
                        <Select v-model="form.city" name="city" id="city"> </Select>
                    </div>
                    <div>
                        <InputLabel for="zip_code" value="Codigo postal" />
                        <TextInput
                            v-model="form.zip_code"
                            placeholder="Codigo postal"
                            id="zip_code"
                            class="mt-1 block w-full"
                            type="text"
                            name="zip_code"
                            required
                            autofocus
                            autocomplete="zip_code"
                        />
                    </div>
                    <div>
                        <InputLabel for="site_reference" value="Lugar de refencia" />
                        <TextInput
                            v-model="form.site_reference"
                            placeholder="Lugar de refencia"
                            id="site_reference"
                            class="mt-1 block w-full"
                            type="text"
                            name="site_reference"
                            required
                            autofocus
                            autocomplete="name"
                        />
                    </div>
                    <div>
                        <InputLabel for="phone" value="Telefono" />
                        <div class="grid grid-cols-[15%_1fr] items-center gap-2">
                            <TextInput
                                v-model="form.phone"
                                placeholder="+1"
                                readonly
                                id="phoneCode"
                                class="mt-1 block w-full"
                                type="text"
                                name="phoneCode"
                                required
                                autofocus
                                autocomplete="phoneCode"
                            />
                            <TextInput
                                v-model="form.phone"
                                placeholder="Telefono"
                                id="phone"
                                class="mt-1 block w-full"
                                type="number"
                                name="phone"
                                required
                                autofocus
                                autocomplete="phone"
                            />
                        </div>
                    </div> -->
                </fieldset>
                <!-- @if (Laravel\Jetstream\Jetstream::hasTermsAndPrivacyPolicyFeature())
                <div v-if=""class="mt-4">
                        <InputLabel for="terms">
                            <div class="flex items-center">
                                <Checkbox name="terms" id="terms" required />
                                <div class="ms-2">
                                    {!! __('I agree to the :terms_of_service and :privacy_policy', [
                                            'terms_of_service' => '<a target="_blank" href="'.route('terms.show').'" class="underline text-sm text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-100 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:focus:ring-offset-gray-800">'.__('Terms of Service').'</a>',
                                            'privacy_policy' => '<a target="_blank" href="'.route('policy.show').'" class="underline text-sm text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-100 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:focus:ring-offset-gray-800">'.__('Privacy Policy').'</a>',
                                            ]) !!}
                                </div>
                            </div>
                        </InputLabel>
                    </div v-else>
                    @endif -->
                <PrimaryButton> Registrarse </PrimaryButton>
                <p class="text-sm font-light text-gray-400">
                    ¿Ya tienes una cuenta? <Link :href="route('login')" class="font-semibold text-[#DE5976] hover:underline">Iniciar sesión</Link>
                </p>
            </form>
        </AuthenticationCard>
    </LandingLayout>
</template>
