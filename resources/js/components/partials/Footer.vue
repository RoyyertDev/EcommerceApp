<script setup>
import { Link } from '@inertiajs/vue3';
</script>
<template>
    <footer class="flex w-full flex-col items-center justify-center gap-4 bg-gray-100 py-10 dark:bg-[#1d1f20]">
        <section
            class="mx-auto flex w-5/6 flex-col gap-4 sm:grid sm:grid-cols-2 sm:grid-rows-2 lg:grid-cols-[1fr_1fr_1fr_auto] lg:grid-rows-1 lg:justify-center"
        >
            <article>
                <img src="/img/logo.png" width="100px" height="60px" alt="JirehImport logo" />
                <p class="text-gray-600 dark:text-gray-400">
                    En <span class="font-semibold italic text-[#DE5976]">Lo Esencial Shop VE,</span> encontrarás una amplia selección de ropa
                    deportiva, casual y uniformes diseñados para ofrecer estilo, comodidad y seguridad. Nos destacamos por nuestra capacidad de
                    adaptarnos rápidamente a las tendencias del mercado, asegurando siempre productos de alta calidad a precios accesibles.
                </p>
            </article>
            <article>
                <h1 class="pb-1 font-semibold">Información</h1>
                <div class="grid grid-cols-2 gap-x-8 gap-y-1 text-gray-600 dark:text-gray-400">
                    <Link class="w-auto transition-all duration-300 hover:text-[#DE5976]" href="/">Inicio</Link>
                    <Link class="w-auto transition-all duration-300 hover:text-[#DE5976]" href="/">Nosotros</Link>
                    <Link class="w-auto transition-all duration-300 hover:text-[#DE5976]" href="/">Productos</Link>
                    <Link class="w-auto transition-all duration-300 hover:text-[#DE5976]" href="/">Carrito</Link>
                    <Link class="w-auto transition-all duration-300 hover:text-[#DE5976]" href="/">Acceder</Link>
                    <Link class="w-auto transition-all duration-300 hover:text-[#DE5976]" href="/">Registrate</Link>
                    <Link
                        target="_blank"
                        class="w-auto transition-all duration-300 hover:text-[#DE5976]"
                        href="https://www.instagram.com/jirehhimport"
                        >Instagram</Link
                    >
                    <Link
                        target="_blank"
                        class="w-auto transition-all duration-300 hover:text-[#DE5976]"
                        href="https://www.facebook.com/profile.php?id=61553835838866&mibextid=ZbWKwL"
                        >Facebook</Link
                    >
                    <Link target="_blank" class="w-auto transition-all duration-300 hover:text-[#DE5976]" href="/">WhatsApp</Link>
                    <Link target="_blank" class="w-auto transition-all duration-300 hover:text-[#DE5976]" href="/">Tiktok</Link>
                </div>
            </article>
            <article>
                <h1 class="pb-1 font-semibold">Contactanos</h1>
                <form action="">
                    <fieldset class="grid grid-cols-2 gap-4">
                        <input
                            class="rounded-lg border-none bg-gray-50 text-black ring-[#DE5976] focus:ring-[#DE5976] focus:ring-offset-0 dark:bg-[#0e0e0e] dark:text-white"
                            type="text"
                            id="nombre"
                            name="nombre"
                            placeholder="Nombre"
                        />
                        <input
                            class="rounded-lg border-none bg-gray-50 text-black ring-[#DE5976] focus:ring-[#DE5976] focus:ring-offset-0 dark:bg-[#0e0e0e] dark:text-white"
                            type="email"
                            id="emailFooter"
                            name="emailFooter"
                            placeholder="Email"
                        />
                        <textarea
                            class="col-span-2 rounded-lg border-none bg-gray-50 text-black ring-[#DE5976] focus:ring-[#DE5976] focus:ring-offset-0 dark:bg-[#0e0e0e] dark:text-white"
                            rows="3"
                            id="mensaje"
                            name="mensaje"
                            placeholder="Mensaje"
                        ></textarea>
                        <button
                            class="col-start-2 w-auto rounded-lg border border-transparent bg-gray-50 px-1 py-1.5 text-gray-600 transition-all duration-300 hover:border-[#DE5976] hover:text-[#DE5976] dark:bg-[#0e0e0e] dark:text-gray-400"
                        >
                            Enviar
                        </button>
                    </fieldset>
                </form>
            </article>
            <article>
                <h1 class="text-cente pb-1 font-semibold">Ubicanos</h1>
                <iframe
                    class="rounded-lg"
                    src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d15704.592568968266!2d-67.6039471!3d10.2496337!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x8e803d0ecb35340d%3A0x2493a677baccaa8f!2sJireh%20Import!5e0!3m2!1ses-419!2sve!4v1729198078844!5m2!1ses-419!2sve"
                    width="100%"
                    height="200"
                    style="border: 0"
                    allowfullscreen=""
                    loading="lazy"
                    referrerpolicy="no-referrer-when-downgrade"
                ></iframe>
            </article>
        </section>
        <span class="mx-auto w-5/6 border border-[#DE5976]"></span>
        <section class="mx-auto w-5/6 text-gray-600 dark:text-gray-400">
            <p>Copyright © 2025 <span class="font-semibold text-[#DE5976]">JirehImport.</span> Todos los derechos reservados.</p>
        </section>
    </footer>
</template>
