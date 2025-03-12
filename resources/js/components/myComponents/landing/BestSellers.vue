<script setup>
import ArticleSection from '@/components/myComponents/ArticleSection.vue';
import SectionMain from '@/components/myComponents/SectionMain.vue';
</script>

<template>
    <SectionMain title="Lo más vendido">
        <template #content>
            <ArticleSection
                title="Conjunto Niños"
                image="/img/masVendido/conjuntoNiños.jpeg"
                description="Lorem ipsum dolor sit amet consectetur adipisicing elit. Doloremque, voluptatibus."
                button="Comprar"
                price="$1,00"
            />
            <ArticleSection
                title="Pantalones"
                image="/img/masVendido/pantalones.jpeg"
                description="Lorem ipsum dolor sit amet consectetur adipisicing elit. Doloremque, voluptatibus."
                button="Comprar"
                price="$2,00"
            />
            <ArticleSection
                title="Sudaderas"
                image="/img/masVendido/sudaderas.jpeg"
                description="Lorem ipsum dolor sit amet consectetur adipisicing elit. Doloremque, voluptatibus."
                button="Comprar"
                price="$3,00"
            />
            <ArticleSection
                class="mdcol-start-2 mdcol-end-2 xlcol-auto"
                title="Franelas"
                image="/img/masVendido/franelas.jpeg"
                description="Lorem ipsum dolor sit amet consectetur adipisicing elit. Doloremque, voluptatibus."
                button="Comprar"
                price="$4,00"
            />
        </template>
        <h1 class="flex items-center justify-center gap-2 pt-8 text-center text-xs font-semibold italic tracking-widest text-[#DE5976] sm:text-sm">
            <img src="/img/envio.png" alt="envio" />CONTAMOS CON ENVIOS INTERNACIONALES <img src="/img/receptor.png" alt="receptor" />
        </h1>
    </SectionMain>
</template>
