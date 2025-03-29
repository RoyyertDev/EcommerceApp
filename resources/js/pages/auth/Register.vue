<script setup>
import AuthenticationCard from '@/components/AuthenticationCard.vue';
import AuthenticationCardLogo from '@/components/AuthenticationCardLogo.vue';
import InputError from '@/components/InputError.vue';
import InputLabel from '@/components/InputLabel.vue';
import PrimaryButton from '@/components/PrimaryButton.vue';
import Select from '@/components/Select.vue';
import TextInput from '@/components/TextInput.vue';
import LandingLayout from '@/layouts/landing/LandingLayout.vue';
import { Head, Link, useForm } from '@inertiajs/vue3';
import { ref } from 'vue';

const formCard = ref(0);
const props = defineProps({
    canLogin: Boolean,
    errors: Object,
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
        onError: () => {
            // Lista de los campos que pertenecen a cada parte del formulario
            const stepOneFields = ['names', 'surnames', 'identification_document', 'email', 'password', 'password_confirmation', 'gender'];
            const stepTwoFields = ['country', 'province', 'city', 'zip_code', 'site_reference', 'phone'];

            // Revisamos si hay errores en los campos del primer paso
            const hasErrorsInStepOne = stepOneFields.some((field) => errors[field]);
            // Revisamos si hay errores en los campos del segundo paso
            const hasErrorsInStepTwo = stepTwoFields.some((field) => errors[field]);

            // Si hay errores en el primer paso, ir a formCard 0
            if (hasErrorsInStepOne) {
                formCard.value = 0;
            }
            // Si hay errores en el segundo paso, ir a formCard 1
            else if (hasErrorsInStepTwo) {
                formCard.value = 1;
            }
        },
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
                <div class="flex items-center justify-between">
                    <h1 class="text-xl font-bold leading-tight tracking-tight">Registrate para crear tu cuenta</h1>
                    <div class="flex items-center space-x-1">
                        <button
                            @click="formCard = 0"
                            type="button"
                            class="rounded-full transition-all duration-300 ease-in-out"
                            :class="{ 'h-2 w-2 bg-[#DE5976]': formCard === 0, 'h-1 w-1.5 bg-zinc-400 dark:bg-gray-100': formCard === 1 }"
                        ></button>
                        <button
                            @click="formCard = 1"
                            type="button"
                            class="rounded-full transition-all duration-300 ease-in-out"
                            :class="{ 'h-1.5 w-1.5 bg-zinc-400 dark:bg-gray-100': formCard === 0, 'h-2 w-2 bg-[#DE5976]': formCard === 1 }"
                        ></button>
                    </div>
                </div>
                <div class="overflow-hidden">
                    <div class="flex transition-transform duration-500 ease-in-out" :style="{ transform: `translateX(-${formCard * 100}%)` }">
                        <fieldset class="grid w-full shrink-0 grid-cols-2 gap-x-4 gap-y-6">
                            <div>
                                <InputLabel for="names" value="Nombres" />
                                <TextInput
                                    v-model="form.names"
                                    placeholder="e.g. Lo Esencial Shop VE"
                                    id="names"
                                    class="mt-1 block w-full"
                                    type="text"
                                    name="names"
                                    autocomplete="names"
                                    autofocus="{{errors.names}}"
                                />
                                <InputError class="mt-2" :message="errors.names" />
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
                                    autocomplete="surnames"
                                />
                                <InputError class="mt-2" :message="errors.surnames" />
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
                                    autocomplete="identification_document"
                                />
                                <InputError class="mt-2" :message="errors.identification_document" />
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
                                    autocomplete="email"
                                />
                                <InputError class="mt-2" :message="errors.email" />
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
                                    autocomplete="new-password"
                                />
                                <InputError class="mt-2" :message="errors.password" />
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
                                    autocomplete="new-password"
                                />
                                <InputError class="mt-2" :message="errors.password_confirmation" />
                            </div>
                            <div>
                                <InputLabel for="sex" value="Sexo" />
                                <Select v-model="form.gender" name="sex" id="sex">
                                    <option value="0">Masculino</option>
                                    <option value="1">Femenino</option>
                                </Select>
                                <InputError class="mt-2" :message="errors.gender" />
                            </div>
                            <PrimaryButton @click="formCard = 1" type="button" class="col-span-2"> Siguiente </PrimaryButton>
                        </fieldset>
                        <fieldset class="grid w-full shrink-0 grid-cols-2 gap-x-4 gap-y-6">
                            <div>
                                <InputLabel for="country" value="Pais" />
                                <Select v-model="form.country" name="country" id="country"> </Select>
                                <InputError class="mt-2" :message="errors.country" />
                            </div>
                            <div>
                                <InputLabel for="province" value="Estado" />
                                <Select v-model="form.province" name="province" id="province"> </Select>
                                <InputError class="mt-2" :message="errors.province" />
                            </div>
                            <div>
                                <InputLabel for="city" value="Ciudad" />
                                <Select v-model="form.city" name="city" id="city"> </Select>
                                <InputError class="mt-2" :message="errors.city" />
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
                                    autocomplete="zip_code"
                                />
                                <InputError class="mt-2" :message="errors.zip_code" />
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
                                    autocomplete="name"
                                />
                                <InputError class="mt-2" :message="errors.site_reference" />
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
                                        autocomplete="phoneCode"
                                    />
                                    <TextInput
                                        v-model="form.phone"
                                        placeholder="Telefono"
                                        id="phone"
                                        class="mt-1 block w-full"
                                        type="number"
                                        name="phone"
                                        autocomplete="phone"
                                    />
                                </div>
                                <InputError class="mt-2" :message="errors.phone" />
                            </div>
                            <PrimaryButton class="col-span-2"> Registrarse </PrimaryButton>
                        </fieldset>
                    </div>
                </div>

                <!-- @if (Laravel\Jetstream\Jetstream::hasTermsAndPrivacyPolicyFeature())
                <div v-if=""class="mt-4">
                        <InputLabel for="terms">
                            <div class="flex items-center">
                                <Checkbox name="terms" id="terms"  />
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
                <p class="text-sm font-light text-gray-400">
                    ¿Ya tienes una cuenta? <Link :href="route('login')" class="font-semibold text-[#DE5976] hover:underline">Iniciar sesión</Link>
                </p>
            </form>
        </AuthenticationCard>
    </LandingLayout>
</template>
