<script setup>
import { Link } from '@inertiajs/vue3';
import { usePage } from '@inertiajs/vue3';

const props = defineProps({
    route: {
        type: String,
    },
});
const active = (props.route == usePage().url);
const classes = (props.route == usePage().url)
            ? 'border-b-2 border-[#DE5976]'
            : 'border-b-2 border-transparent group-hover:border-transparent transition duration-500 ease-out';
</script>
<template>

    <Link v-if="active" :class="classes">
        <slot />
    </Link>
    <div v-else class="relative group">
        <Link  :class="classes">
          <slot />
        </Link>
        <div class="absolute -bottom-.5 left-1/2 w-0 group-hover:w-full border-b-2 border-[#DE5976] transition-all duration-500 ease-out transform -translate-x-1/2"></div>
    </div>
</template>