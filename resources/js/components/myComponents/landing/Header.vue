<script setup>
const imgs = [
    {
        src: '/img/header/Pasamontaña.jpeg',
        alt: 'JirehImport Pasamontaña',
        class: 'col-span-2 row-span-2',
    },
    {
        src: '/img/header/Sueters.jpeg',
        alt: 'JirehImport Sueters',
        class: 'col-start-3 col-end-3 row-start-1 row-end-1',
    },
    {
        src: '/img/header/Sueters2.jpeg',
        alt: 'JirehImport Sueters',
        class: 'col-start-3 col-end-3 row-start-2 row-end-2',
    },
];
</script>
<template>
    <header class="mb-10">
        <section class="grid grid-cols-3 grid-rows-2 gap-5 overflow-x-scroll sm:max-h-[calc(100vh-120px)]">
            <figure v-for="img in imgs" :key="img.src" :class="img.class">
                <img
                    :src="img.src"
                    :alt="img.alt"
                    class="h-full w-full rounded-lg object-fill shadow-[0_1px_8px_-5px_#DE5976] brightness-90 transition-all duration-300 hover:scale-105 hover:shadow-[0_4px_8px_-5px_#DE5976] hover:brightness-125"
                />
            </figure>
        </section>
    </header>
</template>
