<script setup>
defineProps({
    type: {
        type: String,
        default: 'submit',
    },
});
</script>

<template>
    <button
        :type="type"
        class="w-full rounded-lg border border-transparent bg-gray-100 px-1 py-1.5 text-center text-gray-600 hover:border-[#DE5976] hover:text-[#DE5976] disabled:opacity-50 dark:bg-[#1d1f20] dark:text-white"
    >
        <slot />
    </button>
</template>
