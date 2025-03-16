<script setup>
import ButtonRegisterAdmin from '@/components/myComponents/ButtonRegisterAdmin.vue';
import { ref } from 'vue';

const open = ref(false);

const toggleOpen = () => {
    open.value = !open.value;
};
</script>

<template>
    <ButtonRegisterAdmin @toggle="toggleOpen">Registar usuario</ButtonRegisterAdmin>
</template>
