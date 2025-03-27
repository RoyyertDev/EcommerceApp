<script setup>

</script>

<template>
    <div class="mx-auto w-[80rem] max-w-full px-8 m-4">
        <section class="w-full rounded-xl bg-gray-100 dark:bg-zinc-900 shadow-md">
            <aside class="flex items-center justify-end w-full py-3 px-6 gap-4">
            <slot name="head"/>
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