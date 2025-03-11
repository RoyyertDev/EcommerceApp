<script setup>
import { Link } from '@inertiajs/vue3';
</script>
<template>
  <footer class="w-full py-10 bg-gray-100 dark:bg-[#1d1f20] flex flex-col justify-center items-center gap-4">
    <section
        class="w-5/6 mx-auto flex flex-col sm:grid sm:grid-rows-2 sm:grid-cols-2 lg:grid-rows-1 lg:grid-cols-[1fr_1fr_1fr_auto] lg:justify-center gap-4">
        <article>
            <img src="" width="100px" height="60px" alt="JirehImport logo">
            <p class="text-gray-600 dark:text-gray-400">
                En <span class="text-[#DE5976] font-semibold italic">Lo Esencial Shop VE,</span> encontrarás una amplia
                selección de ropa deportiva, casual y uniformes diseñados para ofrecer estilo, comodidad y seguridad.
                Nos destacamos por nuestra capacidad de adaptarnos rápidamente a las tendencias del mercado, asegurando
                siempre productos de alta calidad a precios accesibles.
            </p>
        </article>
        <article>
            <h1 class="font-semibold pb-1">Información</h1>
            <div class="grid grid-cols-2 text-gray-600 dark:text-gray-400 gap-x-8 gap-y-1">
                <Link  class="hover:text-[#DE5976] transition-all duration-300 w-auto"
                    href="/">Inicio</Link>
                <Link  class="hover:text-[#DE5976] transition-all duration-300 w-auto"
                    href="/">Nosotros</Link>
                <Link  class="hover:text-[#DE5976] transition-all duration-300 w-auto"
                    href="/">Productos</Link>
                <Link  class="hover:text-[#DE5976] transition-all duration-300 w-auto"
                    href="/">Carrito</Link>
                <Link  class="hover:text-[#DE5976] transition-all duration-300 w-auto"
                    href="/">Acceder</Link>
                <Link  class="hover:text-[#DE5976] transition-all duration-300 w-auto"
                    href="/">Registrate</Link>
                <Link target="_blank"  class="hover:text-[#DE5976] transition-all duration-300 w-auto"
                    href="https://www.instagram.com/jirehhimport">Instagram</Link>
                <Link target="_blank"  class="hover:text-[#DE5976] transition-all duration-300 w-auto"
                    href="https://www.facebook.com/profile.php?id=61553835838866&mibextid=ZbWKwL">Facebook</Link>
                <Link target="_blank"  class="hover:text-[#DE5976] transition-all duration-300 w-auto"
                    href="/">WhatsApp</Link>
                <Link target="_blank"  class="hover:text-[#DE5976] transition-all duration-300 w-auto"
                    href="/">Tiktok</Link>
            </div>
        </article>
        <article>
            <h1 class="font-semibold pb-1">Contactanos</h1>
            <form action="">
                <fieldset class="grid grid-cols-2 gap-4">
                    <input class="focus:ring-[#DE5976] rounded-lg bg-gray-50 dark:bg-[#0e0e0e] text-black dark:text-white border-none ring-[#DE5976] focus:ring-offset-0"
                        type="text" id="nombre" name="nombre" placeholder="Nombre">
                    <input class="focus:ring-[#DE5976] rounded-lg bg-gray-50 dark:bg-[#0e0e0e] text-black dark:text-white border-none ring-[#DE5976] focus:ring-offset-0"
                        type="email" id="emailFooter" name="emailFooter" placeholder="Email">
                    <textarea
                        class="focus:ring-[#DE5976] col-span-2 rounded-lg bg-gray-50 dark:bg-[#0e0e0e] text-black dark:text-white border-none ring-[#DE5976] focus:ring-offset-0"
                        rows="3" id="mensaje" name="mensaje" placeholder="Mensaje"></textarea>
                    <button
                        class="col-start-2 text-gray-600 dark:text-gray-400 hover:text-[#DE5976] transition-all duration-300 border border-transparent hover:border-[#DE5976] rounded-lg py-1.5 px-1 w-auto bg-gray-50 dark:bg-[#0e0e0e]">Enviar</button>
                </fieldset>
            </form>
            <!-- <button class="text-zinc-400 hover:text-[#DE5976] transition-all duration-300">Iniciar Sesión</button>
            <button class="text-zinc-400 hover:text-[#DE5976] transition-all duration-300">Registrarse</button> -->
        </article>
        <article>
            <h1 class="font-semibold text-cente pb-1">Ubicanos</h1>
            <iframe class="rounded-lg"
                src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d15704.592568968266!2d-67.6039471!3d10.2496337!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x8e803d0ecb35340d%3A0x2493a677baccaa8f!2sJireh%20Import!5e0!3m2!1ses-419!2sve!4v1729198078844!5m2!1ses-419!2sve"
                width="100%" height="200" style="border:0;" allowfullscreen="" loading="lazy"
                referrerpolicy="no-referrer-when-downgrade"></iframe>
        </article>
    </section>
    <span class="w-5/6 border border-[#DE5976] mx-auto"></span>
    <section class="w-5/6 mx-auto text-gray-600 dark:text-gray-400">
        <p>
            Copyright © 2024 <span class="font-semibold text-[#DE5976]">JirehImport.</span> Todos los derechos
            reservados.
        </p>
    </section>
</footer>
</template>
