<script setup>
defineProps({
    title: {
        type: String,
    },
});
</script>

<template>
    <section class="pb-10">
        <h1 class="pb-10 text-center text-4xl font-semibold italic tracking-widest underline decoration-[#DE5976] underline-offset-8">
            {{ title }}
        </h1>
        <div class="grid grid-cols-1 gap-6 sm:grid-cols-2 md:grid-cols-3 xl:grid-cols-4">
            <slot name="content" />
        </div>
        <slot />
    </section>
</template>
