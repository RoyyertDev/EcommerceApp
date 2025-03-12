<script setup>
import ArticleSection from '@/components/myComponents/ArticleSection.vue';
import SectionMain from '@/components/myComponents/SectionMain.vue';
</script>
<template>
    <SectionMain title="Ofrecemos">
        <template #content>
            <ArticleSection
                title="Exclusivo"
                image="/img/ofrecemos/p1.png"
                description="Lorem ipsum dolor sit amet consectetur adipisicing elit. Doloremque, voluptatibus."
                button="Ver más"
            />
            <ArticleSection
                title="Casual"
                image="/img/ofrecemos/p4.png"
                description="Lorem ipsum dolor sit amet consectetur adipisicing elit. Doloremque, voluptatibus."
                button="Ver más"
            />
            <ArticleSection
                title="Deportivo"
                image="/img/ofrecemos/p2.png"
                description="Lorem ipsum dolor sit amet consectetur adipisicing elit. Doloremque, voluptatibus."
                button="Ver más"
            />
            <ArticleSection
                class="md:col-start-2 md:col-end-2 xl:col-auto"
                title="Uniformes"
                image="/img/ofrecemos/p3.png"
                description="Lorem ipsum dolor sit amet consectetur adipisicing elit. Doloremque, voluptatibus."
                button="Ver más"
            />
        </template>
    </SectionMain>
</template>
