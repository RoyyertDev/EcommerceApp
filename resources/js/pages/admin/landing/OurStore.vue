<script setup>
import File from '@/components/myComponents/admin/landing/File.vue';
defineProps({
    ourStore: Array,
});
</script>

<template>
    <article>
        <File
            :id="ourStore.id"
            ratio="2.35/1"
            :image="
                ourStore.img ??
                'https://thumbs.dreamstime.com/b/sin-foto-ni-icono-de-imagen-en-blanco-cargar-im%C3%A1genes-o-falta-marca-no-disponible-pr%C3%B3xima-se%C3%B1al-silueta-naturaleza-simple-marco-215973362.jpg'
            "
        ></File>
    </article>
</template>
