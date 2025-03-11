<script setup>
import { Link } from '@inertiajs/vue3';
import LinksNav from '../myComponents/LinksNav.vue';
import { Home } from 'lucide-vue-next';
defineProps({
    canLogin: {
        type: Boolean,
    },
    canRegister: {
        type: Boolean,
    },
})

</script>
<template>
  <header
    class="w-full mb-4 px-7 md:px-14 lg:px-28 bg-white dark:bg-black sticky top-0 z-10 transition-all duration-100 shadow-[#DE5976] rounded-b-3xl"
    x-data="{ scrolled: false, navOpen: false }" x-on:scroll.window="scrolled = (window.pageYOffset > 0) ? true : false"
    :class="{ 'shadow-[0_4px_5px_-4px]': scrolled }">
    <nav class="sm:grid grid-rows-[1fr_auto_1fr] grid-cols-1 sm:grid-rows-1 sm:grid-cols-[1fr_60%_1fr] md:grid-cols-[1fr_70%_1fr] py-4 transition-all duration-100"
        :class="{ 'grid': navOpen, 'hidden': !navOpen }">
        <div class="flex justify-between w-full">
            <Link  href="/">
                <img class="m-auto" src="" width="80px" height="40px" alt="JirehImport logo">
            </Link>
            <button x-on:click="navOpen = false" class="block sm:hidden">
                <svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" width="32px" height="32px"
                    viewBox="0,0,256,256">
                    <g fill="#DE5976" fill-rule="nonzero" stroke="none" stroke-width="1" stroke-linecap="butt"
                        stroke-linejoin="miter" stroke-miterlimit="10" stroke-dasharray="" stroke-dashoffset="0"
                        font-family="none" font-weight="none" font-size="none" text-anchor="none"
                        style="mix-blend-mode: normal">
                        <g transform="scale(3.55556,3.55556)">
                            <path
                                d="M19,15c-1.023,0 -2.04812,0.39087 -2.82812,1.17188c-1.562,1.562 -1.562,4.09425 0,5.65625l14.17188,14.17188l-14.17187,14.17188c-1.562,1.562 -1.562,4.09425 0,5.65625c0.78,0.78 1.80513,1.17188 2.82813,1.17188c1.023,0 2.04812,-0.39088 2.82813,-1.17187l14.17188,-14.17187l14.17188,14.17188c1.56,1.562 4.09525,1.562 5.65625,0c1.563,-1.563 1.563,-4.09325 0,-5.65625l-14.17187,-14.17187l14.17188,-14.17187c1.562,-1.562 1.562,-4.09425 0,-5.65625c-1.56,-1.561 -4.09625,-1.562 -5.65625,0l-14.17187,14.17188l-14.17187,-14.17187c-0.78,-0.78 -1.80513,-1.17187 -2.82812,-1.17187z">
                            </path>
                        </g>
                    </g>
                </svg>
            </button>
        </div>
        <div class="flex flex-col sm:flex-row justify-center items-center gap-3 md:gap-6 lg:gap-12">
            <LinksNav :route="'/'" href="/">Inicio</LinksNav>
            <LinksNav :route="'about'" href="/">Nosotros</LinksNav>
            <LinksNav :route="''" href="/">Productos</LinksNav>
            <LinksNav :route="''" href="/">Carrito</LinksNav>
            <label class="inline-flex cursor-pointer items-center">
                <input id="dark-mode-toggle" type="checkbox" class="sr-only peer">
                <div
                    class="relative h-6 w-11 bg-gray-200 rounded-full duration-300 after:absolute after:start-[2px] after:top-[2px] after:h-5 after:w-5 after:rounded-full after:bg-black after:transition-all after:duration-300 after:content-[''] peer-checked:bg-[#0e0e0e] peer-checked:after:translate-x-full peer-checked:after:bg-white rtl:peer-checked:after:-translate-x-full">
                </div>
            </label>
        </div>
        <div class="flex justify-center items-center gap-4" v-if="canLogin">
                <!-- @auth
                    @if (Auth::user()->detail && Auth::user()->detail->fk_role === 1)
                        <LinksNav :route="request()->routeIs('admin.dashboard')"
                            href="/dashboard">{{ Auth::user()->names }}</LinksNav>
                    @else
                        <LinksNav :route="request()->routeIs()" href="">{{ Auth::user()->names }}</LinksNav>
                    @endif
                @else
                    <LinksNav :route="request()->routeIs('login')" href="/login">Acceder</LinksNav>
                @endauth -->
        </div>
    </nav>
    <section class="py-4 justify-between w-full flex sm:hidden" :class="{ 'hidden': navOpen, 'flex': !navOpen }">
        <Link  href="/">
            <img class="m-auto" src="" width="80px" height="40px" alt="JirehImport logo">
        </Link>
        <button x-on:click="navOpen = true" class="sm:hidden">
            <svg xmlns="http://www.w3.org/2000/svg" width="32px" height="32px" viewBox="0,0,256,256">
                <g fill="#DE5976" fill-rule="nonzero" stroke="none" stroke-width="1" stroke-linecap="butt"
                    stroke-linejoin="miter" stroke-miterlimit="10" stroke-dasharray="" stroke-dashoffset="0"
                    font-family="none" font-weight="none" font-size="none" text-anchor="none"
                    style="mix-blend-mode: normal">
                    <g transform="scale(3.55556,3.55556)">
                        <path
                            d="M56,48c2.209,0 4,1.791 4,4c0,2.209 -1.791,4 -4,4c-1.202,0 -38.798,0 -40,0c-2.209,0 -4,-1.791 -4,-4c0,-2.209 1.791,-4 4,-4c1.202,0 38.798,0 40,0zM56,32c2.209,0 4,1.791 4,4c0,2.209 -1.791,4 -4,4c-1.202,0 -38.798,0 -40,0c-2.209,0 -4,-1.791 -4,-4c0,-2.209 1.791,-4 4,-4c1.202,0 38.798,0 40,0zM56,16c2.209,0 4,1.791 4,4c0,2.209 -1.791,4 -4,4c-1.202,0 -38.798,0 -40,0c-2.209,0 -4,-1.791 -4,-4c0,-2.209 1.791,-4 4,-4c1.202,0 38.798,0 40,0z">
                        </path>
                    </g>
                </g>
            </svg>
        </button>
    </section>
  </header>
</template>
