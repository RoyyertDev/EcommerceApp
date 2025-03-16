<script setup>
const emit = defineEmits();

const handleClick = () => {
    emit('toggle');
};
</script>

<template>
    <button @click="handleClick" class="rounded-md bg-[#DE5976] px-3 py-2 text-white">
        <slot />
    </button>
</template>
