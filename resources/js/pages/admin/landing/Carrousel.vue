<script setup>
import File from '@/components/myComponents/admin/landing/File.vue';

defineProps({
    carrousel: Object,
});
</script>

<template>
    <article class="grid grid-cols-3 gap-4">
        <File
            classes="col-span-2 row-span-2"
            id="c1"
            :image="
                carrousel.img ??
                'https://thumbs.dreamstime.com/b/sin-foto-ni-icono-de-imagen-en-blanco-cargar-im%C3%A1genes-o-falta-marca-no-disponible-pr%C3%B3xima-se%C3%B1al-silueta-naturaleza-simple-marco-215973362.jpg'
            "
        />
        <File
            classes="col-start-3 col-end-3 row-start-1 row-end-1"
            id="c2"
            :image="
                carrousel.img ??
                'https://thumbs.dreamstime.com/b/sin-foto-ni-icono-de-imagen-en-blanco-cargar-im%C3%A1genes-o-falta-marca-no-disponible-pr%C3%B3xima-se%C3%B1al-silueta-naturaleza-simple-marco-215973362.jpg'
            "
        />
        <File
            classes="col-start-3 col-end-3 row-start-2 row-end-2"
            id="c3"
            :image="
                carrousel.img ??
                'https://thumbs.dreamstime.com/b/sin-foto-ni-icono-de-imagen-en-blanco-cargar-im%C3%A1genes-o-falta-marca-no-disponible-pr%C3%B3xima-se%C3%B1al-silueta-naturaleza-simple-marco-215973362.jpg'
            "
        />
    </article>
</template>
