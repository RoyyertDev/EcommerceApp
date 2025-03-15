<script setup>
const props = defineProps({
    width: {
        type: String,
    },
    logo: {
        type: String,
    },
});
</script>
<template>
    <main class="mx-auto flex h-[calc(100vh-56px)] w-5/6 flex-col items-center justify-center">
        <figure>
            <slot name="logo" />
        </figure>

        <div :class="width + ' ' + 'mt-6 rounded-lg bg-gray-50 shadow-[0_1px_8px_-5px_#DE5976] dark:bg-[#0e0e0e]'">
            <slot />
        </div>
    </main>
</template>
