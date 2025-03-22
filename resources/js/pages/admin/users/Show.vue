<script setup>
import AdminLayout from '@/layouts/admin/AdminLayout.vue';
import CreateView from '@/pages/admin/users/Create.vue';
import Read from '@/pages/admin/users/Read.vue';
import UpdateView  from '@/pages/admin/users/Update.vue';
import { Link } from '@inertiajs/vue3';
import { ref } from 'vue';

defineProps({
	users: Array,
	type: String,
})

const number = ref('5');
const orderBy = ref('');
const ascDesc = ref('asc');
const filter = ref('');
</script>

<template>
	<AdminLayout title="Usuarios">
		<template #header>Gestionar Usuarios</template>
		<main class="min-h-screen bg-gray-50 dark:bg-zinc-950">
			<div class="mx-auto max-w-7xl px-8">
				<div class="flex items-center justify-end w-full py-1 text-white">
					<CreateView />
				</div>
				<section class="w-full rounded-xl bg-gray-100 dark:bg-zinc-900 shadow-md">
					<aside class="flex items-center justify-end w-full py-3 px-6">
						<input readonly
							class="h-9 bg-gray-200 dark:bg-zinc-800 border-gray-300 dark:border-zinc-800 rounded-l-lg text-black dark:text-white w-40 text-sm focus:border-gray-300 dark:focus:border-zinc-700 focus:ring-transparent"
							value="Número de registros:"></input>
						<select v-model="number"
							class="bg-gray-200 dark:bg-zinc-800 rounded-r-lg border-gray-300 dark:border-zinc-700 h-9 text-black dark:text-white cursor-pointer w-20 text-sm focus:border-gray-300 dark:focus:border-zinc-700 focus:ring-transparent mr-4">
							<option value="5">5</option>
							<option value="10">10</option>
							<option value="15">15</option>
							<option value="20">20</option>
							<option value="25">25</option>
						</select>
						<select v-model="orderBy"
							class="bg-gray-200 dark:bg-zinc-800 rounded-l-lg border-gray-300 dark:border-zinc-700 h-9 text-black dark:text-white cursor-pointer w-36 text-sm focus:border-gray-300 dark:focus:border-zinc-700 focus:ring-transparent">
							<option selected disabled value="">Ordenar por...</option>
							<option value="id">Registro</option>
							<option value="names">Nombres</option>
							<option value="surnames">Apellidos</option>
							<option value="identification_document">Identificación</option>
							<option value="email">Correo</option>
							<!-- <option value="phone">Teléfono</option> -->
						</select>
						<select v-model="ascDesc"
							class="bg-gray-200 dark:bg-zinc-800 rounded-r-lg border-gray-300 dark:border-zinc-700 h-9 text-black dark:text-white cursor-pointer w-40 text-sm focus:border-gray-300 dark:focus:border-zinc-700 focus:ring-transparent mr-4">
							<option value="asc">Ascendente</option>
							<option value="desc">Descendente</option>
						</select>
						<select v-model="filter"
							class="bg-gray-200 dark:bg-zinc-800 rounded-l-lg border-gray-300 dark:border-zinc-700 h-9 text-black dark:text-white cursor-pointer w-36 text-sm focus:border-gray-300 dark:focus:border-zinc-700 focus:ring-transparent">
							<option selected disabled value="">Filtrar por...</option>
							<option value="names">Nombres</option>
							<option value="surnames">Apellidos</option>
							<option value="identification_document">Identificación</option>
							<option value="email">Correo</option>
							<!-- <option value="phone">Teléfono</option> -->
						</select>
						<input v-model="search"
							class="bg-gray-200 dark:bg-zinc-800 rounded-r-lg border-gray-300 dark:border-zinc-700 h-9 text-black dark:text-white text-sm focus:border-gray-300 dark:focus:border-zinc-700 focus:ring-transparent"
							type="search" placeholder="Buscar...">
					</aside>
					<table class="table-auto text-black dark:text-white w-full text-sm text-left">
						<thead>
							<tr class="bg-gray-200 dark:bg-zinc-800 my-1 h-9">
								<th class="w-12 text-center">
									<input
										class="text-[#DE5976] focus:ring-0 w-5 h-5 rounded-md bg-gray-200 dark:bg-zinc-800 border-gray-300 dark:border-zinc-700 cursor-pointer hover:bg-gray-300 dark:hover:bg-zinc-700 hover:border-gray-200 dark:hover:border-zinc-600"
										type="checkbox" name="" id="">
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
							<tr
								class="my-1 h-12 border-b border-gray-200 dark:border-zinc-800 hover:bg-gray-200 dark:hover:bg-zinc-800 transition-colors duration-200"
								wire:key="user-{{ $user->id }}">
								<td class="w-12 text-center">
									<input
										class="text-[#DE5976] focus:ring-0 w-5 h-5 rounded-md bg-gray-200 dark:bg-zinc-800 border-gray-300 dark:border-zinc-700 cursor-pointer hover:bg-gray-300 dark:hover:bg-zinc-700 hover:border-gray-200 dark:hover:border-zinc-600"
										type="checkbox" name="" id="">
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
										<Link href="mailto:{{ user . email }}" target="_blank"
											class="hover:scale-125 transition duration-300">
										<img src="/svg/admin/users/gmail.svg" alt="icon de Gmail">
										</Link>
										{{ user.email }}
									</li>
								</td>
								<td>
									<li class="flex gap-2 items-center h-12">
										<Link href="https://wa.me/{{ user . detail . phone ?? '' }}" target="_blank"
											class="hover:scale-125 transition duration-300">
										<img src="/svg/admin/users/whatsapp.svg" alt="icon de whatsapp">
										</Link>
										{{ user.detail.phone ?? '' }}
									</li>
								</td>
								<td class="flex h-12 gap-2">
									<Read :user="user" :key="'read -' + user.id" />
									<UpdateView :user="user" :key="'update -' + user.id"  />
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
