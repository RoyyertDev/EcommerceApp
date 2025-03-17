<script setup>
import Modal from './Modal.vue';

const emit = defineEmits(['close']);

defineProps({
    show: {
        type: Boolean,
        default: false,
    },
    maxWidth: {
        type: String,
        default: '2xl',
    },
    closeable: {
        type: Boolean,
        default: true,
    },
});

const close = () => {
    emit('close');
};
</script>

<template>
    <Modal :show="show" :max-width="maxWidth" :closeable="closeable" @close="close">
        <div class="px-6 py-4 text-black dark:text-white">
            <div class="text-center text-2xl font-semibold">
                <slot name="title" />
            </div>

            <div class="mt-4 text-sm">
                <slot name="content" />
            </div>
        </div>

        <div class="flex flex-row justify-end bg-gray-200 px-6 py-4 text-end dark:bg-zinc-900">
            <slot name="footer" />
        </div>
    </Modal>
</template>
