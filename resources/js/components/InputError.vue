<script setup>
defineProps({
    message: String,
});
</script>

<template>
    <div v-show="message">
        <p class="text-sm text-[#DE5976]">
            {{ message }}
        </p>
    </div>
</template>
