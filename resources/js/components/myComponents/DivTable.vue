<script setup>
import { ref } from 'vue';

defineProps(['buttonsFilter', 'SelectedCatFilter', 'SelectedMatFilter', 'SelectedColorFilter', 'SelectedPriceFilter']);

const number = ref(5);
const orderBy = ref('');
const ascDesc = ref('asc');
const filter = ref('');
const search = ref('');
</script>

<template>
    <div class="mx-auto max-w-7xl px-8">
        <aside class="grid grid-cols-[auto_auto_auto_1fr] items-center justify-center w-full py-1 text-black dark:text-white gap-4">
            <div v-if="buttonsFilter" class="bg-gray-100 dark:bg-zinc-900 border-gray-200 dark:border-zinc-800 rounded-lg text-black dark:text-white text-sm flex items-center justify-center w-full mx-auto p-2 gap-2">
                <slot name="buttonsFilter" />
            </div>
            <div v-else class="w-full p-2 gap-2"></div>

            <div v-if="SelectedCatFilter" class="bg-gray-100 dark:bg-zinc-900 border-gray-200 dark:border-zinc-800 rounded-lg text-black dark:text-white text-sm flex items-center justify-center w-full mx-auto p-2 gap-2">
                <slot name="SelectedCatFilter" />
            </div>
            <div v-else class="w-full p-2 gap-2"></div>

            <div v-if="SelectedMatFilter" class="bg-gray-100 dark:bg-zinc-900 border-gray-200 dark:border-zinc-800 rounded-lg text-black dark:text-white text-sm flex items-center justify-center w-full mx-auto p-2 gap-2">
                <slot name="SelectedMatFilter" />
            </div>
            <div v-else class="w-full p-2 gap-2"></div>

            <div class="flex items-center justify-end">
                <slot name="buttonAside" />
            </div>
        </aside>
        <section class="w-full rounded-xl bg-gray-100 dark:bg-zinc-900 shadow-md">
            <aside class="flex items-center justify-end w-full py-3 px-6">
                <input readonly class="h-9 bg-gray-200 dark:bg-zinc-800 border-gray-300 dark:border-zinc-700 rounded-l-lg text-black dark:text-white w-40 text-sm focus:border-gray-300 dark:focus:border-zinc-700 focus:ring-transparent" value="Número de registros:"></input>
                <select v-model="number" class="bg-gray-200 dark:bg-zinc-800 rounded-r-lg border-gray-300 dark:border-zinc-700 h-9 text-black dark:text-white cursor-pointer w-20 text-sm focus:border-gray-300 dark:focus:border-zinc-700 focus:ring-transparent mr-4">
                    <option value="5">5</option>
                    <option value="10">10</option>
                    <option value="15">15</option>
                    <option value="20">20</option>
                    <option value="25">25</option>
                </select>
                <select v-model="orderBy" class="bg-gray-200 dark:bg-zinc-800 rounded-l-lg border-gray-300 dark:border-zinc-700 h-9 text-black dark:text-white cursor-pointer w-36 text-sm focus:border-gray-300 dark:focus:border-zinc-700 focus:ring-transparent">    
                    <option selected disabled value="">Ordenar por...</option>
                    <slot name="optionsOrderBy" />
                </select>
                <select v-model="ascDesc" class="bg-gray-200 dark:bg-zinc-800 rounded-r-lg border-gray-300 dark:border-zinc-700 h-9 text-black dark:text-white cursor-pointer w-40 text-sm focus:border-gray-300 dark:focus:border-zinc-700 focus:ring-transparent mr-4">
                    <option value="asc">Ascendente</option>
                    <option value="desc">Descendente</option>
                </select>
                <select v-model="filter" class="bg-gray-200 dark:bg-zinc-800 rounded-l-lg border-gray-300 dark:border-zinc-700 h-9 text-black dark:text-white cursor-pointer w-36 text-sm focus:border-gray-300 dark:focus:border-zinc-700 focus:ring-transparent">
                    <option selected disabled value="">Filtrar por...</option>
                    <slot name="optionsFilter" />
                </select>
                <input v-model="search" class="bg-gray-200 dark:bg-zinc-800 rounded-r-lg border-gray-300 dark:border-zinc-700 h-9 text-black dark:text-white text-sm focus:border-gray-300 dark:focus:border-zinc-700 focus:ring-transparent" type="search" placeholder="Buscar...">
            </aside>
            <table class="table-auto text-black dark:text-white w-full text-sm text-left">
                <thead>
                    <tr class="bg-gray-200 dark:bg-zinc-800 my-1 h-9">
                        <th class="w-12 text-center">
                            <input class=" text-[#DE5976] focus:ring-0 w-5 h-5 rounded-md bg-gray-200 dark:bg-zinc-800 border-gray-300 dark:border-zinc-700 cursor-pointer hover:bg-zinc-700 hover:border-zinc-600" type="checkbox" name="" id=""> 
                        </th>
                        <slot name="thHead" />
                        <th class="">
                            Acciones
                        </th>
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