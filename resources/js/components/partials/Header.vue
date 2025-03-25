<script setup>
import { Link, usePage } from '@inertiajs/vue3';
import { onMounted, ref } from 'vue';
import LinksNav from '../myComponents/LinksNav.vue';
import ToggleTheme from './ToggleTheme.vue';

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
const authUser = usePage().props.auth.user;
const roleAdmin = usePage().props.roleAdmin;
onMounted(() => {
    window.addEventListener('scroll', () => {
        scrolled.value = window.pageYOffset > 0 ? true : false;
    });
});
</script>
<template>
    <header
        class="sticky top-0 z-10 mb-4 h-14 w-full rounded-b-3xl bg-white px-7 shadow-[#DE5976] transition-all duration-500 dark:bg-black md:px-14 lg:px-28"
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
                <ToggleTheme />
            </div>
            <div class="flex items-center justify-center gap-4" v-if="canLogin">
                <LinksNav v-if="authUser" :href="route(authUser.detail && authUser.detail.role_id === roleAdmin ? 'admin.dashboard.create' : 'dashboard')">{{
                    authUser.names
                }}</LinksNav>
                <LinksNav v-else route="/login" :href="route('login')">Acceder</LinksNav>
            </div>
        </nav>
    </header>
</template>
