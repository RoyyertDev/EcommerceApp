<script setup>
import { Link, usePage } from '@inertiajs/vue3';

const props = defineProps({
    route: {
        type: String,
    },
    href: {
        type: String,
    },
});
const active = props.route == usePage().url;
const classes = active ? 'border-b-2 border-[#DE5976]' : 'border-b-2 border-transparent group-hover:border-transparent';
</script>
<template>
    <Link v-if="active" :class="classes" :href="href">
        <slot />
    </Link>
    <div v-else class="group relative">
        <Link :class="classes" :href="href">
            <slot />
        </Link>
        <div
            class="-bottom-.5 transition-color absolute left-1/2 w-0 -translate-x-1/2 transform border-b-2 border-[#DE5976] duration-500 ease-out group-hover:w-full"
        ></div>
    </div>
</template>
