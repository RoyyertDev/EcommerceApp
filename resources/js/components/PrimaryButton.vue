<script setup>
defineProps({
    type: {
        type: String,
        default: 'submit',
    },
});
</script>

<template>
    <button :type="type" class="w-full hover:text-[#DE5976] transition-all duration-300 border border-transparent hover:border-[#DE5976] text-center py-1.5 px-1 bg-gray-100 dark:bg-[#1d1f20] rounded-lg text-gray-600 dark:text-white focus:outline-none focus:ring-2 focus:ring-[#DE5976] disabled:opacity-50">
        <slot />
    </button>
</template>
