<script setup>
defineProps(['title']);
</script>

<template>
    <div class="m-4 mx-auto w-[80rem] max-w-full px-8">
        <section class="w-full rounded-xl bg-gray-100 shadow-md dark:bg-zinc-900">
            <header class="flex w-full items-center justify-between px-6 py-3">
                <h2 class="text-lg font-medium text-black dark:text-white">{{ title }}</h2>
                <slot name="head" />
            </header>
            <table class="w-full table-fixed text-left text-sm text-black dark:text-white">
                <thead>
                    <tr class="my-1 h-9 bg-gray-200 dark:bg-zinc-800">
                        <th class="w-12 text-center">
                            <input
                                class="h-5 w-5 cursor-pointer rounded-md border-gray-300 bg-gray-200 text-[#DE5976] hover:border-zinc-600 hover:bg-zinc-700 focus:ring-0 dark:border-zinc-700 dark:bg-zinc-800"
                                type="checkbox"
                                name=""
                                id=""
                            />
                        </th>
                        <slot name="thHead" />
                        <th class="">Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    <slot name="tBody" />
                </tbody>
            </table>
            <footer class="w-full px-6 py-3">
                <slot name="footer" />
                <!-- {{ $footer }} -->
            </footer>
        </section>
    </div>
</template>
