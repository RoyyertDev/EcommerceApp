<script setup>
import File from '@/components/myComponents/admin/landing/File.vue';
defineProps({
    about: Array,
});
</script>

<template>
    <article>
        <!-- col-start-3 row-start-1 col-span-2 row-span-2 -->
        <File
            :id="about.id"
            width="280px"
            :image="
                about.img ??
                'https://thumbs.dreamstime.com/b/sin-foto-ni-icono-de-imagen-en-blanco-cargar-im%C3%A1genes-o-falta-marca-no-disponible-pr%C3%B3xima-se%C3%B1al-silueta-naturaleza-simple-marco-215973362.jpg'
            "
        />
    </article>
</template>
