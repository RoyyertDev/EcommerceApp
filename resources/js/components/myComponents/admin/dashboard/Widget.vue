<script setup>
defineProps(['title', 'h4']);
</script>

<template>
    <div
        class="flex flex-col gap-4 rounded-xl bg-gray-100 p-4 shadow-sm transition-all duration-300 hover:scale-105 hover:shadow-[#DE597694] dark:bg-zinc-900"
    >
        <h3 class="text-sm font-semibold text-black dark:text-slate-200">{{ title }}</h3>
        <div class="grid grid-cols-2 items-center justify-center gap-4">
            <slot />
            <h4 class="text-center text-6xl font-semibold text-black dark:text-white">{{ h4 }}</h4>
        </div>
    </div>
</template>
