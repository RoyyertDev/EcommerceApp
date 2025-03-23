<script setup>
const toggleTheme = () => {
    document.documentElement.classList.toggle('dark');
};
</script>

<template>
    <label class="inline-flex cursor-pointer items-center">
        <input @click="toggleTheme" id="dark-mode-toggle" type="checkbox" class="peer sr-only" />
        <div
            class="relative h-6 w-11 rounded-full bg-gray-200 duration-300 after:absolute after:start-[2px] after:top-[2px] after:h-5 after:w-5 after:rounded-full after:bg-black after:transition-all after:duration-300 after:content-[''] peer-checked:bg-[#0e0e0e] peer-checked:after:translate-x-full peer-checked:after:bg-white rtl:peer-checked:after:-translate-x-full"
        ></div>
    </label>
</template>
