<script setup>
import { Link, usePage } from '@inertiajs/vue3';
import { onMounted, ref } from 'vue';
import LinksNav from '../myComponents/LinksNav.vue';

defineProps({
    canLogin: {
        type: Boolean,
    },
});
let navOpen = ref(false),
    scrolled = ref(false);
function toggleNav() {
    navOpen.value = !navOpen.value;
}
// function toggleTheme() {
//     document.documentElement.classList.add('dark');
// }
onMounted(() => {
    const authUser = usePage().props.auth.user;
    window.addEventListener('scroll', () => {
        scrolled.value = window.pageYOffset > 0 ? true : false;
    });
});
</script>
<template>
    <header
        class="sticky top-0 z-10 mb-4 w-full rounded-b-3xl bg-white px-7 shadow-[#DE5976] transition-all duration-500 md:px-14 lg:px-28 dark:bg-black"
        :class="{ 'shadow-[0_4px_5px_-4px]': scrolled || navOpen }"
    >
        <nav
            class="grid-cols-1 grid-rows-[1fr_auto_1fr] overflow-hidden py-4 transition-all duration-500 sm:grid sm:grid-cols-[1fr_60%_1fr] sm:grid-rows-1 md:grid-cols-[1fr_70%_1fr]"
            :class="{ 'max-h-14': !navOpen, 'max-h-screen': navOpen }"
        >
            <div class="mb-4 flex w-full justify-between sm:mb-0">
                <Link href="/">
                    <img class="m-auto" src="/img/logo.png" width="80px" height="40px" alt="JirehImport logo" />
                </Link>
                <button @click="toggleNav" class="block sm:hidden">
                    <img src="/svg/toggleNav.svg" alt="toggleNav" />
                </button>
            </div>
            <div class="flex flex-col items-center justify-center gap-3 sm:flex-row md:gap-6 lg:gap-12">
                <LinksNav route="/" href="/">Inicio</LinksNav>
                <LinksNav route="/about" href="/about">Nosotros</LinksNav>
                <LinksNav route="" href="/">Productos</LinksNav>
                <LinksNav route="" href="/">Carrito</LinksNav>
                <label class="inline-flex cursor-pointer items-center">
                    <input id="dark-mode-toggle" type="checkbox" class="peer sr-only" />
                    <div
                        class="relative h-6 w-11 rounded-full bg-gray-200 duration-300 after:absolute after:start-[2px] after:top-[2px] after:h-5 after:w-5 after:rounded-full after:bg-black after:transition-all after:duration-300 after:content-[''] peer-checked:bg-[#0e0e0e] peer-checked:after:translate-x-full peer-checked:after:bg-white rtl:peer-checked:after:-translate-x-full"
                    ></div>
                </label>
            </div>
            <div class="flex items-center justify-center gap-4" v-if="canLogin">
                <LinksNav v-if="authUser" :href="authUser.detail && authUser.detail.role_id === 1 ? '/admin/dashboard' : '/dashboard'">{{
                    authUser.names
                }}</LinksNav>
                <LinksNav v-else route="/login" href="/login">Acceder</LinksNav>
            </div>
        </nav>
    </header>
</template>
