<script setup>
import SectionMain from '@/components/myComponents/SectionMain.vue';
</script>

<template>
    <SectionMain title="Atención">
        <div class="grid grid-cols-1 gap-6 sm:grid-cols-2 md:grid-cols-3 xl:grid-cols-4">
            <figure class="overflow-hidden rounded-lg shadow-[0_3px_8px_-5px] shadow-[#DE5976] transition-all duration-300 hover:scale-105">
                <img src="/img/atencion/nosAdaptamos.jpeg" alt="Nos adaptamos" />
            </figure>
            <figure class="overflow-hidden rounded-lg shadow-[0_3px_8px_-5px] shadow-[#DE5976] transition-all duration-300 hover:scale-105">
                <img src="/img/atencion/pasos.jpeg" alt="Pasos" />
            </figure>
            <figure class="overflow-hidden rounded-lg shadow-[0_3px_8px_-5px] shadow-[#DE5976] transition-all duration-300 hover:scale-105">
                <img src="/img/atencion/mejorRopa.jpeg" alt="Mejor Ropa" />
            </figure>
            <figure
                class="overflow-hidden rounded-lg shadow-[0_3px_8px_-5px] shadow-[#DE5976] transition-all duration-300 hover:scale-105 md:col-start-2 md:col-end-2 xl:col-auto"
            >
                <img src="/img/atencion/questions.jpeg" alt="Preguntas" />
            </figure>
        </div>
    </SectionMain>
</template>
