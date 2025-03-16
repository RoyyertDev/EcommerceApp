<script setup>
defineProps(['type']);
</script>
<template>
    <button
        class="black:hover:bg-zinc-800 h-9 rounded-lg px-1.5 py-1 text-black transition-all duration-200 hover:bg-gray-200 active:bg-gray-200 dark:text-white dark:active:bg-zinc-800"
        @click="$set('type', type)"
    >
        <slot />
    </button>
</template>
