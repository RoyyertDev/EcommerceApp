<script setup>
import { onMounted, ref } from 'vue';

defineProps({
    modelValue: String,
});

defineEmits(['update:modelValue']);

const input = ref(null);

onMounted(() => {
    if (input.value.hasAttribute('autofocus')) {
        input.value.focus();
    }
});

defineExpose({ focus: () => input.value.focus() });
</script>

<template>
    <input
        ref="input"
        class="focus:ring-0.5 rounded-lg border-transparent bg-gray-100 shadow-sm focus:border-[#DE5976] focus:ring-[#DE5976] dark:bg-[#1d1f20]"
        :value="modelValue"
        @input="$emit('update:modelValue', $event.target.value)"
    />
</template>
