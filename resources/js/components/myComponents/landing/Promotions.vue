<script setup>
import ArticleSection from '@/components/myComponents/ArticleSection.vue';
import SectionMain from '@/components/myComponents/SectionMain.vue';
</script>

<template>
    <SectionMain title="Promociones">
        <template #content>
            <ArticleSection
                title="Sudaderas"
                image="/img/promociones/sudaderas.jpeg"
                description="Lorem ipsum dolor sit amet consectetur adipisicing elit. Doloremque, voluptatibus."
                button="Comprar"
                price="$10,00"
            />
            <ArticleSection
                title="Franelas"
                image="/img/promociones/franelas.jpeg"
                description="Lorem ipsum dolor sit amet consectetur adipisicing elit. Doloremque, voluptatibus."
                button="Comprar"
                price="$10,00"
            />
            <ArticleSection
                title="Piezas"
                image="/img/promociones/piezas.jpeg"
                description="Lorem ipsum dolor sit amet consectetur adipisicing elit. Doloremque, voluptatibus."
                button="Comprar"
                price="240 Piezas"
            />
            <ArticleSection
                class="md:col-start-2 md:col-end-2 xl:col-auto"
                title="Pantalones"
                image="/img/promociones/pantalones.jpeg"
                description="Lorem ipsum dolor sit amet consectetur adipisicing elit. Doloremque, voluptatibus."
                button="Comprar"
                price="20,00"
            />
        </template>
        <h1 class="flex items-center justify-center gap-2 pt-8 text-center text-xs font-semibold italic tracking-widest text-[#DE5976] sm:text-sm">
            <img src="/img/promocion.png" alt="promocion" />¡LA MEJOR FORMA DE AHORRAR! NO TE LO PIERDAS¡
            <img src="/img/ahorrar-dinero.png" alt="ahorrar-dinero" />
        </h1>
    </SectionMain>
</template>
