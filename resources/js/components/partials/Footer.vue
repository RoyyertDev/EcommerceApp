<script setup>
import { Link } from '@inertiajs/vue3';
import { ref } from 'vue';

const email = ref('');
const error = ref('');

function validateForm(e) {
    const regex = /^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.(com|es|net|org|info)$/i;

    if (!regex.test(email.value)) {
        e.preventDefault();
        error.value = 'Ingresa un correo válido que termine en .com, .es, .net, etc.';
        return;
    }

    error.value = '';
}
</script>
<template>
    <footer class="flex w-full flex-col items-center justify-center gap-4 bg-gray-100 py-10 dark:bg-[#1d1f20]">
        <section
            class="mx-auto flex w-5/6 flex-col gap-4 sm:grid sm:grid-cols-2 sm:grid-rows-2 lg:grid-cols-[1fr_1fr_1fr_auto] lg:grid-rows-1 lg:justify-center"
        >
            <article>
                <img src="/img/logo.png" width="100px" height="60px" alt="JirehImport logo" />
                <p class="pt-4 text-gray-600 dark:text-gray-400">
                    En <span class="font-semibold italic text-[#DE5976]">Lo Esencial Shop VE,</span> encontrarás una amplia selección de ropa
                    deportiva, casual y uniformes diseñados para ofrecer estilo, comodidad y seguridad.
                </p>
            </article>
            <article>
                <h1 class="pb-1 font-semibold">Información</h1>
                <div class="grid grid-cols-2 gap-x-8 gap-y-1 text-gray-600 dark:text-gray-400">
                    <Link class="w-auto hover:text-[#DE5976]" href="/">Inicio</Link>
                    <Link class="w-auto hover:text-[#DE5976]" href="/about">Nosotros</Link>
                    <!-- <Link class="w-auto hover:text-[#DE5976]" href="/">Productos</Link>
                    <Link class="w-auto hover:text-[#DE5976]" href="">Carrito</Link> -->
                    <Link class="w-auto hover:text-[#DE5976]" :href="route('login')">Acceder</Link>
                    <Link class="w-auto hover:text-[#DE5976]" :href="route('register')">Registrate</Link>
                    <Link target="_blank" class="w-auto hover:text-[#DE5976]" href="https://www.instagram.com/jirehhimport">Instagram</Link>
                    <Link
                        target="_blank"
                        class="w-auto hover:text-[#DE5976]"
                        href="https://www.facebook.com/profile.php?id=61553835838866&mibextid=ZbWKwL"
                        >Facebook</Link
                    >
                    <Link target="_blank" class="w-auto hover:text-[#DE5976]" href="/">WhatsApp</Link>
                    <Link target="_blank" class="w-auto hover:text-[#DE5976]" href="/">Tiktok</Link>
                </div>
            </article>
            <article>
                <h1 class="pb-1 font-semibold">Contactanos</h1>
                <form action="" @submit="validateForm">
                    <fieldset class="grid grid-cols-2 gap-4">
                        <input
                            class="rounded-lg border-none bg-gray-50 text-black ring-[#DE5976] focus:ring-[#DE5976] focus:ring-offset-0 dark:bg-[#0e0e0e] dark:text-white"
                            type="text"
                            id="nombre"
                            name="nombre"
                            placeholder="Nombres"
                            required
                            pattern="[A-Za-zÁÉÍÓÚáéíóúÑñ\s]+"
                            title="Solo letras y espacios"
                        />
                        <input
                            class="rounded-lg border-none bg-gray-50 text-black ring-[#DE5976] focus:ring-[#DE5976] focus:ring-offset-0 dark:bg-[#0e0e0e] dark:text-white"
                            type="email"
                            v-model="email"
                            id="emailFooter"
                            name="emailFooter"
                            placeholder="Email"
                            required
                        />
                        <textarea
                            class="col-span-2 rounded-lg border-none bg-gray-50 text-black ring-[#DE5976] focus:ring-[#DE5976] focus:ring-offset-0 dark:bg-[#0e0e0e] dark:text-white"
                            rows="3"
                            id="mensaje"
                            name="mensaje"
                            placeholder="Mensaje"
                            required
                        ></textarea>
                        <button
                            class="col-start-2 w-auto rounded-lg border border-transparent bg-gray-50 px-1 py-1.5 text-gray-600 hover:border-[#DE5976] hover:text-[#DE5976] dark:bg-[#0e0e0e] dark:text-gray-400"
                        >
                            Enviar
                        </button>
                    </fieldset>
                    <p v-if="error" class="mt-2 text-red-500">{{ error }}</p>
                </form>
            </article>
            <article>
                <h1 class="text-cente pb-1 font-semibold">Ubicanos</h1>
            </article>
        </section>
        <span class="mx-auto w-5/6 border border-[#DE5976]"></span>
        <section class="mx-auto w-5/6 text-gray-600 dark:text-gray-400">
            <p>Copyright © 2025 <span class="font-semibold text-[#DE5976]">JirehImport.</span> Todos los derechos reservados.</p>
        </section>
    </footer>
</template>
