<script setup>
const props = defineProps({
    width: {
        type: String
    },
    logo: {
        type: String
    }
})
</script>
<template>
    <main class="w-5/6 h-screen mx-auto flex flex-col justify-center items-center">
        <figure>
            <slot name="logo" />
        </figure>

        <div :class="width + ' ' + 'mt-6 bg-gray-50 dark:bg-[#0e0e0e] shadow-[0_1px_8px_-5px_#DE5976] rounded-lg'">
            <slot />
        </div>
    </main>
</template>
