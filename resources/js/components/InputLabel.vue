<script setup>
defineProps({
    value: String,
});
</script>

<template>
    <label v-if="value" class="mb-2 block text-sm font-medium">
        {{ value }}
    </label>
    <label v-else class="mb-2 block text-sm font-medium">
        <slot />
    </label>
</template>
