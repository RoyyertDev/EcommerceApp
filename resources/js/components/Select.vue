<script setup>
defineProps({
    modelValue: String,
});
defineEmits(['update:modelValue']);
</script>

<template>
    <select
        :value="modelValue"
        @change="$emit('update:modelValue', $event.target.value)"
        class="focus:ring-0.5 w-full cursor-pointer rounded-lg border-transparent bg-gray-100 shadow-sm focus:border-[#DE5976] focus:ring-[#DE5976] dark:bg-[#1d1f20]"
    >
        <option selected disabled value="">Seleccione</option>
        <slot />
    </select>
</template>
