<script setup>
const props = defineProps({
    title: {
        type: String,
    },
    image: {
        type: String,
    },
    description: {
        type: String,
    },
    button: {
        type: String,
    },
    price: {
        type: String,
    },
});
const price = props.price ?? null;
</script>
<template>
    <article
        class="grid grid-rows-[auto_1fr] gap-4 rounded-lg bg-gray-50 p-4 shadow-[0_1px_8px_-5px_#DE5976] transition-all duration-300 hover:scale-105 hover:shadow-[0_3px_8px_-5px_#DE5976] dark:bg-[#0e0e0e]"
    >
        <figure class="h-full w-full overflow-hidden rounded-lg">
            <img :src="image" :alt="title" />
        </figure>
        <div v-if="price !== null" class="flex items-center justify-between">
            <h1>{{ title }}</h1>
            <span class="text-center font-semibold text-[#DE5976]">{{ price }}</span>
        </div>
        <h1 v-else class="text-center text-xl font-semibold">{{ title }}</h1>
        <p class="text-gray-600 dark:text-gray-400">{{ description }}</p>
        <button class="m-auto w-auto rounded-lg border px-4 py-1 transition-all duration-300 hover:border-[#DE5976] hover:text-[#DE5976]">
            {{ button }}
        </button>
    </article>
</template>
