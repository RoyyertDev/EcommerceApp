<script setup>
defineProps({
    value: String,
});
</script>

<template>
    <label class="block mb-2 font-medium text-sm">
        {{ value }}
    </label>
</template>
