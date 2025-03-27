<script setup>
import { ref } from 'vue';

defineProps({
    id: String,
    image: String,
    classes: String,
    ratio: String,
    width: String,
});
const file = ref(null);
</script>

<template>
    <label
        :for="id"
        class="group relative flex h-full w-full cursor-pointer items-center justify-center transition-all duration-300 hover:scale-[103%]"
        :class="classes"
    >
        <img
            :src="image"
            :alt="id"
            class="rounded-lg object-cover group-hover:brightness-[0.4]"
            :style="{ aspectRatio: ratio ?? '1/1', width: width }"
        />
        <div class="absolute hidden h-full w-full flex-col items-center justify-center group-hover:flex">
            <svg class="h-8 w-8" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 16">
                <path
                    stroke="currentColor"
                    stroke-linecap="round"
                    stroke-linejoin="round"
                    stroke-width="2"
                    d="M13 13h3a3 3 0 0 0 0-6h-.025A5.56 5.56 0 0 0 16 6.5 5.5 5.5 0 0 0 5.207 5.021C5.137 5.017 5.071 5 5 5a4 4 0 0 0 0 8h2.167M10 15V6m0 0L8 8m2-2 2 2"
                />
            </svg>
            <p class="text-center text-sm text-white"><span class="font-semibold">Click para actualizar</span> o arrastra y suelta</p>
            <p class="text-center text-xs text-white">PNG o JPG (MAX. 1024x1024)</p>
        </div>
        <input @change="file = $event.target.files[0]" class="hidden" type="file" name="id" id="id" accept="image/*" />
    </label>
</template>
