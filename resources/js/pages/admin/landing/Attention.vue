<script setup>
import File from '@/components/myComponents/admin/landing/File.vue';
defineProps({
    attentions: Object,
});
</script>

<template>
    <article class="grid grid-cols-4 gap-4">
        <File
            v-for="attention in 4"
            :id="attention.id"
            :image="
                attention.image ??
                'https://thumbs.dreamstime.com/b/sin-foto-ni-icono-de-imagen-en-blanco-cargar-im%C3%A1genes-o-falta-marca-no-disponible-pr%C3%B3xima-se%C3%B1al-silueta-naturaleza-simple-marco-215973362.jpg'
            "
        ></File>
        <!-- <File id="a2" image="{{ '/storage' . '/' . ($attentions->where('id', 2)->first()->image ?? '') }}"></File>
        <File id="a3" image="{{ '/storage' . '/' . ($attentions->where('id', 3)->first()->image ?? '') }}"></File>
        <File id="a4" image="{{ '/storage' . '/' . ($attentions->where('id', 4)->first()->image ?? '') }}"></File> -->
        <!-- <File id="ab" image="{{ '/storage' . '/' . ($abouts->where('id', 1)->first()->image ?? '') }}"
            >col-start-3 row-start-1 col-span-2 row-span-2</File
        > -->
    </article>
</template>
