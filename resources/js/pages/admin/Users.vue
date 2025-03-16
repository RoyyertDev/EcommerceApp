<script setup>
import AdminLayout from '@/layouts/admin/AdminLayout.vue';
const props = defineProps({
  users: Array,
})
</script>

<template>
  <AdminLayout title="Usuarios">
      <template #header>Gestionar Usuarios</template>
      <main class="min-h-screen bg-gray-50 dark:bg-zinc-950">
    <div class="mx-auto max-w-7xl px-8">
        <div class="flex items-center justify-end w-full py-1 text-white">
            <!-- @livewire('admin.users.create') -->
            
        </div>
        <section class="w-full rounded-xl bg-gray-100 dark:bg-zinc-900 shadow-md">
            <aside class="flex items-center justify-end w-full py-3 px-6">
                <input readonly class="h-9 bg-gray-200 dark:bg-zinc-800 border-gray-300 dark:border-zinc-800 rounded-l-lg text-black dark:text-white w-40 text-sm focus:border-gray-300 dark:focus:border-zinc-700 focus:ring-transparent" value="Número de registros:"></input>
                <select v-model="number" class="bg-gray-200 dark:bg-zinc-800 rounded-r-lg border-gray-300 dark:border-zinc-700 h-9 text-black dark:text-white cursor-pointer w-20 text-sm focus:border-gray-300 dark:focus:border-zinc-700 focus:ring-transparent mr-4">
                    <option value="5">5</option>
                    <option value="10">10</option>
                    <option value="15">15</option>
                    <option value="20">20</option>
                    <option value="25">25</option>
                </select>
                <select v-model="orderBy" class="bg-gray-200 dark:bg-zinc-800 rounded-l-lg border-gray-300 dark:border-zinc-700 h-9 text-black dark:text-white cursor-pointer w-36 text-sm focus:border-gray-300 dark:focus:border-zinc-700 focus:ring-transparent">
                    <option selected disabled value="">Ordenar por...</option>
                    <option value="id">Registro</option>
                    <option value="names">Nombres</option>
                    <option value="surnames">Apellidos</option>
                    <option value="identification_document">Identificación</option>
                    <option value="email">Correo</option>
                    <!-- <option value="phone">Teléfono</option> -->
                </select>
                <select v-model="ascDesc" class="bg-gray-200 dark:bg-zinc-800 rounded-r-lg border-gray-300 dark:border-zinc-700 h-9 text-black dark:text-white cursor-pointer w-40 text-sm focus:border-gray-300 dark:focus:border-zinc-700 focus:ring-transparent mr-4">
                    <option value="asc">Ascendente</option>
                    <option value="desc">Descendente</option>
                </select>
                <select v-model="filter" class="bg-gray-200 dark:bg-zinc-800 rounded-l-lg border-gray-300 dark:border-zinc-700 h-9 text-black dark:text-white cursor-pointer w-36 text-sm focus:border-gray-300 dark:focus:border-zinc-700 focus:ring-transparent">
                    <option selected disabled value="">Filtrar por...</option>
                    <option value="names">Nombres</option>
                    <option value="surnames">Apellidos</option>
                    <option value="identification_document">Identificación</option>
                    <option value="email">Correo</option>
                    <!-- <option value="phone">Teléfono</option> -->
                </select>
                <input v-model="search" class="bg-gray-200 dark:bg-zinc-800 rounded-r-lg border-gray-300 dark:border-zinc-700 h-9 text-black dark:text-white text-sm focus:border-gray-300 dark:focus:border-zinc-700 focus:ring-transparent" type="search" placeholder="Buscar...">
            </aside>
            <table class="table-auto text-black dark:text-white w-full text-sm text-left">
                <thead>
                    <tr class="bg-gray-200 dark:bg-zinc-800 my-1 h-9">
                        <th class="w-12 text-center">
                            <input class="text-[#DE5976] focus:ring-0 w-5 h-5 rounded-md bg-gray-200 dark:bg-zinc-800 border-gray-300 dark:border-zinc-700 cursor-pointer hover:bg-gray-300 dark:hover:bg-zinc-700 hover:border-gray-200 dark:hover:border-zinc-600" type="checkbox" name="" id=""> 
                        </th>
                        <th class="">
                            Nombres
                        </th>
                        <th class="">
                            Apellidos
                        </th>
                        <th class="">
                            Doc. Identificación
                        </th>
                        <th class="">
                            Correo electronico
                        </th>
                        <th class="">
                            Telefono
                        </th>
                        <th class="">
                            Acciones
                        </th>
                    </tr>
                </thead>
                <tbody v-for="user in users">
                        <tr class="my-1 h-12 border-b border-gray-200 dark:border-zinc-800 hover:bg-gray-200 dark:hover:bg-zinc-800 transition-colors duration-200" wire:key="user-{{ $user->id }}">
                            <td class="w-12 text-center">
                                <input class="text-[#DE5976] focus:ring-0 w-5 h-5 rounded-md bg-gray-200 dark:bg-zinc-800 border-gray-300 dark:border-zinc-700 cursor-pointer hover:bg-gray-300 dark:hover:bg-zinc-700 hover:border-gray-200 dark:hover:border-zinc-600" type="checkbox" name="" id="">
                            </td>
                            <td class="">
                                {{ user.names }}
                            </td>
                            <td class="">
                                {{ user.surnames }}
                            </td>
                            <td class="">
                                {{ user.identification_document }}
                            </td>
                            <td>
                                <li class="flex gap-1 items-center h-12">
                                    <a href="mailto:{{ user.email }}" target="_blank" class="hover:scale-125 transition duration-300">
                                        <svg width="30px" height="30px" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" id="Capa_1" style="enable-background:new 0 0 150 150;" version="1.1" viewBox="0 0 150 150" xml:space="preserve">
<!--                                             <style type="text/css">
                                                .st0{fill:#1A73E8;}
                                                .st1{fill:#EA4335;}
                                                .st2{fill:#4285F4;}
                                                .st3{fill:#FBBC04;}
                                                .st4{fill:#34A853;}
                                                .st5{fill:#4CAF50;}
                                                .st6{fill:#1E88E5;}
                                                .st7{fill:#E53935;}
                                                .st8{fill:#C62828;}
                                                .st9{fill:#FBC02D;}
                                                .st10{fill:#1565C0;}
                                                .st11{fill:#2E7D32;}
                                                .st12{fill:#F6B704;}
                                                .st13{fill:#E54335;}
                                                .st14{fill:#4280EF;}
                                                .st15{fill:#34A353;}
                                                .st16{clip-path:url(#SVGID_2_);}
                                                .st17{fill:#188038;}
                                                .st18{opacity:0.2;fill:#FFFFFF;enable-background:new    ;}
                                                .st19{opacity:0.3;fill:#0D652D;enable-background:new    ;}
                                                .st20{clip-path:url(#SVGID_4_);}
                                                .st21{opacity:0.3;fill:url(#_45_shadow_1_);enable-background:new    ;}
                                                .st22{clip-path:url(#SVGID_6_);}
                                                .st23{fill:#FA7B17;}
                                                .st24{opacity:0.3;fill:#174EA6;enable-background:new    ;}
                                                .st25{opacity:0.3;fill:#A50E0E;enable-background:new    ;}
                                                .st26{opacity:0.3;fill:#E37400;enable-background:new    ;}
                                                .st27{fill:url(#Finish_mask_1_);}
                                                .st28{fill:#FFFFFF;}
                                                .st29{fill:#0C9D58;}
                                                .st30{opacity:0.2;fill:#004D40;enable-background:new    ;}
                                                .st31{opacity:0.2;fill:#3E2723;enable-background:new    ;}
                                                .st32{fill:#FFC107;}
                                                .st33{opacity:0.2;fill:#1A237E;enable-background:new    ;}
                                                .st34{opacity:0.2;}
                                                .st35{fill:#1A237E;}
                                                .st36{fill:url(#SVGID_7_);}
                                                .st37{fill:#FBBC05;}
                                                .st38{clip-path:url(#SVGID_9_);fill:#E53935;}
                                                .st39{clip-path:url(#SVGID_11_);fill:#FBC02D;}
                                                .st40{clip-path:url(#SVGID_13_);fill:#E53935;}
                                                .st41{clip-path:url(#SVGID_15_);fill:#FBC02D;}
                                            </style> -->
                                            <g>
                                                <path class="st5" d="M121.1,57.9L99.1,74.3v35.8h15.4c3.6,0,6.6-2.9,6.6-6.6V57.9z"/>
                                                <path class="st6" d="M28.9,57.9l21.9,16.5v35.8H35.5c-3.6,0-6.6-2.9-6.6-6.6V57.9z"/>
                                                <polygon class="st7" points="99.1,46.9 75,65 50.9,46.9 50.9,74.3 75,92.4 99.1,74.3  "/>
                                                <path class="st8" d="M28.9,49.3v8.6l21.9,16.5V46.9L44,41.8c-1.6-1.2-3.6-1.9-5.7-1.9l0,0C33.1,39.9,28.9,44.1,28.9,49.3z"/>
                                                <path class="st9" d="M121.1,49.3v8.6L99.1,74.3V46.9l6.9-5.1c1.6-1.2,3.6-1.9,5.7-1.9l0,0C116.9,39.9,121.1,44.1,121.1,49.3z"/>
                                            </g>
                                        </svg>
                                    </a>
                                    {{ user.email }}
                                </li>
                            </td>
                            <td>
                                <li class="flex gap-2 items-center h-12">
                                    <a href="https://wa.me/{{ user.detail.phone ?? '' }}" target="_blank" class="hover:scale-125 transition duration-300">
                                        <svg width="20px" height="20px" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" enable-background="new 0 0 512 512" id="Layer_1" version="1.1" viewBox="0 0 512 512" xml:space="preserve">
                                            <g>
                                                <path d="M500.4,241.8c-0.6,63.4-16.9,113-50.8,156.1c-36.4,46.3-83.8,75.7-141.8,87.6   c-44.8,9.1-88.4,5.1-131.2-10.4c-9.5-3.5-18.8-7.6-27.7-12.5c-2.7-1.5-5-1.7-8-0.7c-40.5,13.1-81.1,26.1-121.7,39   c-1.8,0.6-4.2,2.3-5.6,1c-1.6-1.6,0.4-4,1-5.9c8.1-24.1,16.2-48.3,24.4-72.4c5-14.7,9.8-29.3,15-43.9c1.4-3.8,0.9-6.7-1.2-10.2   c-10.3-17.6-17.9-36.4-23.3-56.1c-10.1-37-11.2-74.4-3.3-111.8c8.6-40.8,26.6-77.2,54.3-108.6c33.5-38,74.8-63.1,123.9-75.2   c31.3-7.7,62.9-8.9,94.7-3.7c41.6,6.8,79.1,23.3,111.8,49.9c34,27.7,58.8,62.1,74.4,103.4C493.9,189.7,500.7,226.2,500.4,241.8z    M74.6,441.5c24.8-8,48.5-15.6,72-23.3c3.1-1,5.6-0.8,8.3,1c9,6,18.7,10.8,28.7,15c32.5,13.8,66.3,18.8,101.2,14.3   c42.8-5.5,80.4-22.7,112-52.6c39.8-37.7,61.1-83.9,63-138.5c1.8-53.5-15.4-100.5-51.3-140.4c-34.1-37.9-76.9-59.5-127.4-64.9   c-43.9-4.7-85,4.8-123,27.6c-32.5,19.6-57.4,46.3-74.7,80c-19.1,37.1-25.6,76.5-20.1,117.8c4.1,31.2,15.3,59.9,33.3,85.7   c2,2.9,2.6,5.3,1.4,8.7c-3.7,10.2-7,20.5-10.5,30.7C83.3,415.2,79.2,427.8,74.6,441.5z" fill="#51C85D"/>
                                                <path d="M141,194.7c0.5-23.8,8.9-41.5,24.8-55.6c5.1-4.6,11.4-6.6,18.5-5.6c3,0.4,6,0.7,9,0.5   c5.6-0.3,9.4,2.4,11.3,7.3c6.7,17.4,13.2,34.8,19.7,52.3c2.2,6-1.6,10.7-4.8,15c-3.7,5.1-8.2,9.6-12.6,14.1   c-4.5,4.6-5.1,7.2-2,12.8c18.1,32.9,43.5,58.2,78,73.8c1.2,0.5,2.4,1.2,3.6,1.8c4.6,2.1,8.7,1.6,12.2-2.4   c6.4-7.5,13.4-14.4,19.3-22.3c3.9-5.2,6.6-6.1,12.5-3.5c17.6,7.6,34.1,17.2,50.9,26.5c3.1,1.7,4.2,4.3,4.1,7.9   c-0.9,29.5-17.8,44.9-47.5,51.7c-14.4,3.3-27.7-0.3-40.9-5.1c-27.7-10-54.4-21.8-76.8-41.6c-17.8-15.8-33.5-33.4-46.8-53.1   c-10.2-15.2-20.8-30.1-26.7-47.8C143.4,212,140.9,202.4,141,194.7z" fill="#51C85D"/>
                                            </g>
                                        </svg>
                                    </a>
                                    {{ user.detail.phone ?? '' }}
                                </li>
                            </td>
                            <td class="flex h-12 gap-2">
                                <!-- @livewire('admin.users.read', ['id' => $user->id], key('red-' . $user->id))
                                @livewire('admin.users.update', ['id' => $user->id], key('update-' . $user->id)) -->
                            </td>
                        </tr>
                </tbody>
            </table>
            <footer class="w-full px-6 py-3">
               <!--  {{ users->links() }} -->
            </footer>
          </section>
        </div>
      </main>
  </AdminLayout>
</template>
