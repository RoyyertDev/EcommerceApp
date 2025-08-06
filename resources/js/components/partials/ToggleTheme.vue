<script setup>
import { onMounted } from 'vue';

const toggleTheme = () => {
    const isDark = document.documentElement.classList.toggle('dark');
    localStorage.setItem('theme', isDark ? 'dark' : 'light');
};

onMounted(() => {
    const theme = localStorage.getItem('theme');
    if (theme === 'dark') {
        document.documentElement.classList.add('dark');
        const checkbox = document.getElementById('dark-mode-toggle');
        checkbox.checked = true;
    }
});
</script>

<template>
    <label class="mb-2.5 inline-flex cursor-pointer items-center sm:mb-0">
        <input @click="toggleTheme" id="dark-mode-toggle" type="checkbox" class="peer sr-only" />
        <div
            class="relative h-6 w-11 rounded-full bg-[#0e0e0e] duration-300 after:absolute after:start-[2px] after:top-[2px] after:h-5 after:w-5 after:rounded-full after:bg-white after:transition-all after:duration-300 after:content-[''] peer-checked:bg-gray-200 peer-checked:after:translate-x-full peer-checked:after:bg-black rtl:peer-checked:after:-translate-x-full"
        ></div>
    </label>
</template>
