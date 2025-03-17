<script setup>
defineProps({
    value: String,
});
</script>

<template>
    <label class="mb-2 block text-sm font-medium">
        {{ value }}
    </label>
</template>
