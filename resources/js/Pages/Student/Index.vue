<template>
    <app-layout>
        <template #header>
            <h1 class="font-semibold text-xl text-gray-800 leading-tight">
                Estudiantes
            </h1>
        </template>

        <!-- List -->
        <container>
                <button
                    v-on:click.prevent="showCreateModal(student.personal_code)"
                    class="inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:shadow-outline-gray transition ease-in-out duration-150"
                >
                    Nuevo Estudiante
                </button>
                <input type="text" placeholder="Buscar..." v-model="q" class="mt-1 rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm">
                <div class="bg-white shadow-md rounded my-6">
                    <table v-if="students.length!==0" class="min-w-max w-full table-auto">
                        <thead>
                        <tr class="bg-gray-200 text-gray-600 uppercase text-sm leading-normal">
                            <th class="py-3 px-6 text-left">Código Personal</th>
                            <th class="py-3 px-6 text-left">Nombre</th>
                            <th class="py-3 px-6 text-center">Apellido</th>
                            <th class="py-3 px-6 text-center">Actions</th>
                        </tr>
                        </thead>
                        <tbody class="text-gray-600 text-sm font-light">
                        <tr v-for="student in students" :key="student.personal_code" class="border-b border-gray-200 hover:bg-gray-100">
                            <td class="py-3 px-6 text-left whitespace-nowrap">
                                <span class="font-medium">{{ student.personal_code }}</span>
                            </td>
                            <td class="py-3 px-6 text-left">
                                <span class="font-medium">{{ student.name }}</span>
                            </td>
                            <td class="py-3 px-6 text-center">
                                <span class="font-medium">{{ student.last_name }}</span>
                            </td>
                            <td class="py-3 px-6 text-center">
                                <div class="flex item-center justify-center">
                                    <!--:href="route('student.show', student.personal_code)"-->
                                    <!-- @click="showShowModal(student.personal_code)" -->
                                    <!-- :href="showShowModal(student.personal_code)" -->

                                    <!-- v-on:click.prevent="showShowModal(student.personal_code)" -->
                                    <!-- :href="route('student.index')" -->
                                    <button
                                        v-on:click.prevent="showShowModal(student.personal_code)"

                                    class="w-4 mr-2 transform hover:text-purple-500 hover:scale-110"
                                    >
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                                        </svg>
                                    </button>

                                    <button
                                        v-on:click.prevent="showEditModal(student.personal_code)"
                                    class="w-4 mr-2 transform hover:text-purple-500 hover:scale-110"
                                    >
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z" />
                                        </svg>
                                    </button>

                                    <inertia-link
                                    method="delete"
                                    :href="route('student.destroy', student.personal_code)"
                                    class="w-4 mr-2 transform hover:text-purple-500 hover:scale-110"
                                    as="button"
                                    >
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                        </svg>
                                    </inertia-link>
                                </div>
                            </td>
                        </tr>
                        </tbody>
                    </table>
                    <h1 v-if="students.length===0"  class="font-semibold text-xl text-gray-800 leading-tight px-36">
                        **Sin resultados**
                    </h1>
                </div>
        </container>

        <!-- Show Modal -->
        <dialog-modal :show="modals.showModal" @close="modals.showModal = false">
            <template #title>
                {{ modals.title }}
            </template>

            <template #content>
                        <!-- Form with data --->

                        <form @submit.prevent="modals.showModal=false" >
                            <div class="overflow-hidden shadow sm:rounded-md">
                                <div class="bg-white px-4 py-5 sm:p-6">
                                    <div class="grid grid-cols-6 gap-6">

                                        <div class="col-span-6 sm:col-span-2">
                                            <label for="personal_code" class="block text-sm font-medium text-gray-700">Código Personal</label>
                                            <input
                                                type="text"
                                                name="personal_code"
                                                id="personal_code"
                                                v-model="form.personal_code"
                                                autocomplete="street-address"
                                                disabled
                                                class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm bg-gray-100"
                                            />
                                        </div>
                                        <div class="col-span-6 sm:col-span-2">
                                            <label for="personal_code" class="block text-sm font-medium text-gray-700">Nombre</label>
                                            <input
                                                type="text"
                                                name="name"
                                                id="name"
                                                v-model="form.name"
                                                autocomplete="street-address"
                                                disabled
                                                class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm bg-gray-100"
                                            />
                                        </div>
                                        <div class="col-span-6 sm:col-span-2">
                                            <label for="personal_code" class="block text-sm font-medium text-gray-700">Apellidos</label>
                                            <input
                                                type="text"
                                                name="last_name"
                                                id="last_name"
                                                v-model="form.last_name"
                                                autocomplete="street-address"
                                                disabled
                                                class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm bg-gray-100"
                                            />
                                        </div>
                                        <div class="col-span-6 sm:col-span-2">
                                            <label for="personal_code" class="block text-sm font-medium text-gray-700">Grado</label>
                                            <input
                                                type="text"
                                                name="grade_id"
                                                id="grade_id"
                                                v-model="form.grade_id"
                                                autocomplete="street-address"
                                                disabled
                                                class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm bg-gray-100"
                                            />
                                        </div><div class="col-span-6 sm:col-span-1">
                                        <label for="personal_code" class="block text-sm font-medium text-gray-700">Sección</label>
                                        <input
                                            type="text"
                                            name="section"
                                            id="section"
                                            v-model="form.section"
                                            autocomplete="street-address"
                                            disabled
                                            class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm bg-gray-100"
                                        />
                                    </div>

                                        <div class="col-span-6 sm:col-span-1">
                                            <label for="personal_code" class="block text-sm font-medium text-gray-700">Fecha de Nacimiento</label>
                                            <input
                                                type="datetime-local"
                                                name="birth_date"
                                                id="birth_date"
                                                v-model="form.birth_date"
                                                autocomplete="street-address"
                                                disabled
                                                class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm bg-gray-100"
                                            />
                                        </div>

                                        <div class="col-span-6 sm:col-span-2">
                                            <label for="personal_code" class="block text-sm font-medium text-gray-700">Horario de Clases</label>
                                            <input
                                                type="number"
                                                name="class_schedule_id"
                                                id="class_schedule_id"
                                                v-model="form.class_schedule_id"
                                                autocomplete="street-address"
                                                disabled
                                                class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm bg-gray-100"
                                            />
                                        </div>

                                        <div class="col-span-6 sm:col-span-2">
                                            <label for="personal_code" class="block text-sm font-medium text-gray-700">Documento de Identificación</label>
                                            <input
                                                type="text"
                                                name="identification_document"
                                                id="identification_document"
                                                v-model="form.identification_document"
                                                autocomplete="street-address"
                                                disabled
                                                class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm bg-gray-100"
                                            />
                                        </div>
                                        <div class="col-span-6 sm:col-span-2">
                                            <label for="personal_code" class="block text-sm font-medium text-gray-700">No. Documento de Identificación</label>
                                            <input
                                                type="number"
                                                name="identification_document_number"
                                                id="identification_document_number"
                                                v-model="form.identification_document_number"
                                                autocomplete="street-address"
                                                disabled
                                                class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm bg-gray-100"
                                            />
                                        </div>

                                        <div class="col-span-2">
                                            <label for="personal_code" class="block text-sm font-medium text-gray-700">Catedrático</label>
                                            <label
                                                type="number"
                                                name="professor_dpi"
                                                id="professor_dpi"
                                                class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm bg-gray-100"
                                            >{{ form.professor.dpi }} {{form.professor.name}} {{form.professor.last_name}}</label>
                                        </div>
                                        <div class="col-span-6 sm:col-span-3">
                                            <label for="personal_code" class="block text-sm font-medium text-gray-700">Tutelar</label>
                                            <input
                                                type="text"
                                                name="tutelary_name"
                                                id="tutelary_name"
                                                v-model="form.tutelary_name"
                                                autocomplete="street-address"
                                                disabled
                                                class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm bg-gray-100"
                                            />
                                        </div>
                                        <div class="col-span-6 sm:col-span-3">
                                            <label for="personal_code" class="block text-sm font-medium text-gray-700">DPI del Tutelar</label>
                                            <input
                                                type="number"
                                                name="tutelary_dpi"
                                                id="tutelary_dpi"
                                                v-model="form.tutelary_dpi"
                                                autocomplete="street-address"
                                                disabled
                                                class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm bg-gray-100"
                                            />
                                        </div>

                                    </div>

                                </div>

                                <div class="bg-gray-50 px-4 py-3 text-right sm:px-6">
                                    <button
                                        v-on:click="modals.showModal = false"
                                        class="inline-flex justify-center rounded-md border border-transparent bg-gray-800 py-2 px-4 text-sm font-medium text-white shadow-sm hover:bg-gray-700 focus:outline-none focus:outline-none focus:border-gray-900 focus:shadow-outline-gray transition ease-in-out duration-150"
                                    >
                                        Cerrar
                                    </button>
                                </div>

                            </div>
                        </form>

                        <!-- End Form with data -->

            </template>

        </dialog-modal>

        <!-- Create Modal -->
        <dialog-modal :show="modals.createModal" @close="modals.createModal = false">
            <template #title>
                {{ modals.title }}
            </template>

            <template #content>
                <!-- Form with data --->
                <form @submit.prevent="submit(form); modals.createModal = false" >
                    <div class="overflow-hidden shadow sm:rounded-md">
                        <div class="bg-white px-4 py-5 sm:p-6">
                            <div class="grid grid-cols-6 gap-6">

                                <div class="col-span-6 sm:col-span-2">
                                    <label for="name" class="block text-sm font-medium text-gray-700">Nombre</label>
                                    <input
                                        type="text"
                                        name="name"
                                        id="name"
                                        v-model="form.name"
                                        autocomplete="street-address"
                                        class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm"
                                    />
                                </div>
                                <div class="col-span-6 sm:col-span-2">
                                    <label for="last_name" class="block text-sm font-medium text-gray-700">Apellidos</label>
                                    <input
                                        type="text"
                                        name="last_name"
                                        id="last_name"
                                        v-model="form.last_name"
                                        autocomplete="street-address"
                                        class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm"
                                    />
                                </div>
                                <div class="col-span-6 sm:col-span-2">
                                    <label for="grade_id" class="block text-sm font-medium text-gray-700">Grado</label>
                                    <input
                                        type="text"
                                        name="grade_id"
                                        id="grade_id"
                                        v-model="form.grade_id"
                                        autocomplete="street-address"
                                        class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm"
                                    />
                                </div><div class="col-span-6 sm:col-span-1">
                                <label for="section" class="block text-sm font-medium text-gray-700">Sección</label>
                                <input
                                    type="text"
                                    name="section"
                                    id="section"
                                    v-model="form.section"
                                    autocomplete="street-address"
                                    class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm"
                                />
                            </div>

                                <div class="col-span-6 sm:col-span-1">
                                    <label for="birth_date" class="block text-sm font-medium text-gray-700">Fecha de nacimiento</label>
                                    <input
                                        type="date"
                                        name="birth_date"
                                        id="birth_date"
                                        v-model="form.birth_date"
                                        autocomplete="street-address"
                                        class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm"
                                    />
                                </div>

                                <div class="col-span-6 sm:col-span-2">
                                    <label for="class_schedule_id" class="block text-sm font-medium text-gray-700">Horario de clases</label>
                                    <input
                                        type="number"
                                        name="class_schedule_id"
                                        id="class_schedule_id"
                                        v-model="form.class_schedule_id"
                                        autocomplete="street-address"
                                        class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm"
                                    />
                                </div>

                                <div class="col-span-6 sm:col-span-2">
                                    <label for="identification_document" class="block text-sm font-medium text-gray-700">Documento de identificación</label>
                                    <input
                                        type="text"
                                        name="identification_document"
                                        id="identification_document"
                                        v-model="form.identification_document"
                                        autocomplete="street-address"
                                        class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm"
                                    />
                                </div>
                                <div class="col-span-6 sm:col-span-2">
                                    <label for="identification_document_number" class="block text-sm font-medium text-gray-700">No. de documento de identificación</label>
                                    <input
                                        type="number"
                                        name="identification_document_number"
                                        id="identification_document_number"
                                        v-model="form.identification_document_number"
                                        autocomplete="street-address"
                                        class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm"
                                    />
                                </div>

                                <div class="col-span-2">
                                    <label for="professor_dpi" class="block text-sm font-medium text-gray-700">Catedrático</label>
                                    <v-select
                                        v-model="form.professor_dpi"
                                        :filter="professorSearch"
                                        :options="professors"
                                        :reduce="option => option.dpi"
                                        :get-option-label="professor => professor.dpi + ' ' + professor.name + ' ' + professor.last_name"
                                    >
                                        <template #option="{ dpi, name, last_name }">
                                            {{ dpi }}
                                            <br />
                                            <cite>{{ name }} {{ last_name }}</cite>
                                        </template>
                                    </v-select>
                                </div>
                                <div class="col-span-6 sm:col-span-3">
                                    <label for="tutelary_name" class="block text-sm font-medium text-gray-700">Tutelar</label>
                                    <input
                                        type="text"
                                        name="tutelary_name"
                                        id="tutelary_name"
                                        v-model="form.tutelary_name"
                                        autocomplete="street-address"
                                        class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm"
                                    />
                                </div>
                                <div class="col-span-6 sm:col-span-3">
                                    <label for="tutelary_dpi" class="block text-sm font-medium text-gray-700">DPI del tutelar</label>
                                    <input
                                        type="number"
                                        name="tutelary_dpi"
                                        id="tutelary_dpi"
                                        v-model="form.tutelary_dpi"
                                        autocomplete="street-address"
                                        class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm"
                                    />
                                </div>

                            </div>
                        </div>

                        <div class="bg-gray-50 px-4 py-3 text-right sm:px-6">
                            <button
                                type="button"
                                v-on:click="cleanForm"
                                class="inline-flex justify-center rounded-md border border-transparent bg-gray-800 py-2 px-4 text-sm font-medium text-white shadow-sm hover:bg-gray-700 focus:outline-none focus:outline-none focus:border-gray-900 focus:shadow-outline-gray transition ease-in-out duration-150"
                            >
                                Limpiar
                            </button>
                            <button
                                type="button"
                                v-on:click="modals.createModal = false"
                                class="inline-flex justify-center rounded-md border border-transparent bg-gray-800 py-2 px-4 text-sm font-medium text-white shadow-sm hover:bg-gray-700 focus:outline-none focus:outline-none focus:border-gray-900 focus:shadow-outline-gray transition ease-in-out duration-150"
                            >
                                Cancelar
                            </button>
                            <button type="submit" class="inline-flex justify-center rounded-md border border-transparent bg-indigo-600 py-2 px-4 text-sm font-medium text-white shadow-sm hover:bg-indigo-700 focus:outline-none focus:border-gray-900 focus:shadow-outline-gray transition ease-in-out duration-150">
                                Guardar
                            </button>
                        </div>
                    </div>
                </form>
            </template>
        </dialog-modal>

        <!-- Edit Modal -->
        <dialog-modal :show="modals.editModal" @close="modals.editModal = false">
            <template #title>
                {{ modals.title }}
            </template>

            <template #content>
                <!-- Form with data --->
                <form @submit.prevent="update(form); modals.editModal=false"  >
                    <div class="overflow-hidden shadow sm:rounded-md">
                        <div class="bg-white px-4 py-5 sm:p-6">
                            <div class="grid grid-cols-6 gap-6">
                                <div class="col-span-6 sm:col-span-2">
                                    <label for="personal_code" class="block text-sm font-medium text-gray-700">Código Personal</label>
                                    <input
                                        type="text"
                                        name="personal_code"
                                        id="personal_code"
                                        v-model="form.personal_code"
                                        disabled
                                        autocomplete="street-address"
                                        class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm"
                                    />
                                </div>
                                <div class="col-span-6 sm:col-span-2">
                                    <label for="name" class="block text-sm font-medium text-gray-700">Nombre</label>
                                    <input
                                        type="text"
                                        name="name"
                                        id="name"
                                        v-model="form.name"
                                        autocomplete="street-address"
                                        class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm"
                                    />
                                </div>
                                <div class="col-span-6 sm:col-span-2">
                                    <label for="last_name" class="block text-sm font-medium text-gray-700">Apellidos</label>
                                    <input
                                        type="text"
                                        name="last_name"
                                        id="last_name"
                                        v-model="form.last_name"
                                        autocomplete="street-address"
                                        class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm"
                                    />
                                </div>
                                <div class="col-span-6 sm:col-span-1">
                                    <label for="grade_id" class="block text-sm font-medium text-gray-700">Grade_id</label>
                                    <input
                                        type="text"
                                        name="grade_id"
                                        id="grade_id"
                                        v-model="form.grade_id"
                                        autocomplete="street-address"
                                        class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm"
                                    />
                                </div><div class="col-span-6 sm:col-span-1">
                                <label for="section" class="block text-sm font-medium text-gray-700">Section</label>
                                <input
                                    type="text"
                                    name="section"
                                    id="section"
                                    v-model="form.section"
                                    autocomplete="street-address"
                                    class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm"
                                />
                            </div>

                                <div class="col-span-6 sm:col-span-1">
                                    <label for="birth_date" class="block text-sm font-medium text-gray-700">Fecha de cumpleaños</label>
                                    <input
                                        type="datetime-local"
                                        name="birth_date"
                                        id="birth_date"
                                        v-model="form.birth_date"
                                        autocomplete="street-address"
                                        class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm"
                                    />
                                </div>

                                <div class="col-span-6 sm:col-span-2">
                                    <label for="class_schedule_id" class="block text-sm font-medium text-gray-700">Horario de clases</label>
                                    <input
                                        type="number"
                                        name="class_schedule_id"
                                        id="class_schedule_id"
                                        v-model="form.class_schedule_id"
                                        autocomplete="street-address"
                                        class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm"
                                    />
                                </div>

                                <div class="col-span-6 sm:col-span-1">
                                    <label for="identification_document" class="block text-sm font-medium text-gray-700">Doc. identificación</label>
                                    <input
                                        type="text"
                                        name="identification_document"
                                        id="identification_document"
                                        v-model="form.identification_document"
                                        autocomplete="street-address"
                                        class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm"
                                    />
                                </div>
                                <div class="col-span-6 sm:col-span-1">
                                    <label for="identification_document_number" class="block text-sm font-medium text-gray-700">No. doc. identificación</label>
                                    <input
                                        type="number"
                                        name="identification_document_number"
                                        id="identification_document_number"
                                        v-model="form.identification_document_number"
                                        autocomplete="street-address"
                                        class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm"
                                    />
                                </div>
                                <div class="col-span-2">
                                    <label for="professor_dpi" class="block text-sm font-medium text-gray-700">Escuela</label>
                                    <v-select
                                        v-model="form.professor.school"
                                        :filter="schoolSearch"
                                        :options="schools"
                                        :reduce="option => option.id"
                                        :get-option-label="school => school.id + ' ' + school.name"
                                        @input="form.professor.school_id = form.professor.school;changeSchool"
                                    >
                                        <template #option="{ dpi, name, last_name }">
                                            {{ dpi }}
                                            <br />
                                            <cite>{{ name }} {{ last_name }}</cite>
                                        </template>
                                    </v-select>

                                </div>
                                <div class="col-span-3">
                                    <label for="professor_dpi" class="block text-sm font-medium text-gray-700">Catedrático</label>
                                    <v-select
                                        v-model="form.professor"
                                        :filter="professorSearch"
                                        :options="professors"
                                        :reduce="option => option.dpi"
                                        :get-option-label="professor => professor.dpi + ' ' + professor.name + ' ' + professor.last_name"
                                        @input="form.professor_dpi = form.professor"
                                    >
                                        <template #option="{ dpi, name, last_name }">
                                            {{ dpi }}
                                            <br />
                                            <cite>{{ name }} {{ last_name }}</cite>
                                        </template>
                                    </v-select>

                                </div>
                                <div class="col-span-6 sm:col-span-3">
                                    <label for="tutelary_name" class="block text-sm font-medium text-gray-700">Tutelary Name</label>
                                    <input
                                        type="text"
                                        name="tutelary_name"
                                        id="tutelary_name"
                                        v-model="form.tutelary_name"
                                        autocomplete="street-address"
                                        class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm"
                                    />
                                </div>
                                <div class="col-span-6 sm:col-span-3">
                                    <label for="tutelary_dpi" class="block text-sm font-medium text-gray-700">Tutelary DPI</label>
                                    <input
                                        type="number"
                                        name="tutelary_dpi"
                                        id="tutelary_dpi"
                                        v-model="form.tutelary_dpi"
                                        autocomplete="street-address"
                                        class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm"
                                    />
                                </div>

                            </div>
                        </div>

                        <div class="bg-gray-50 px-4 py-3 text-right sm:px-6">

                            <button
                                type="button"
                                v-on:click="modals.editModal = false"
                                class="inline-flex justify-center rounded-md border border-transparent bg-gray-800 py-2 px-4 text-sm font-medium text-white shadow-sm hover:bg-gray-700 focus:outline-none focus:outline-none focus:border-gray-900 focus:shadow-outline-gray transition ease-in-out duration-150"
                            >
                                Cancelar
                            </button>
                            <button type="submit" class="inline-flex justify-center rounded-md border border-transparent bg-indigo-600 py-2 px-4 text-sm font-medium text-white shadow-sm hover:bg-indigo-700 focus:outline-none focus:border-gray-900 focus:shadow-outline-gray transition ease-in-out duration-150">
                                Actualizar
                            </button>
                        </div>
                    </div>
                </form>
            </template>
        </dialog-modal>

        <!-- Error Modal -->
        <dialog-modal :show="modals.errorModal" @close="modals.errorModal = false">
            <template #title>
                {{ modals.title }}
            </template>

            <template #content>
                <!-- Form with data --->

                    <div class="overflow-hidden shadow sm:rounded-md">
                        <div class="bg-white px-4 py-5 sm:p-6">
                            <div class="grid grid-cols-6 gap-6">

                                <div class="col-span-6 sm:col-span-2">
                                    <label class="block text-sm font-medium text-gray-700">{{ errors }}</label>
                                </div>

                            </div>

                        </div>

                        <div class="bg-gray-50 px-4 py-3 text-right sm:px-6">
                            <button
                                v-on:click="modals.errorModal = false"
                                class="inline-flex justify-center rounded-md border border-transparent bg-gray-800 py-2 px-4 text-sm font-medium text-white shadow-sm hover:bg-gray-700 focus:outline-none focus:outline-none focus:border-gray-900 focus:shadow-outline-gray transition ease-in-out duration-150"
                            >
                                Cerrar
                            </button>
                        </div>

                    </div>

                <!-- End Form with data -->

            </template>

        </dialog-modal>


    </app-layout>
</template>

<script>
import AppLayout from '@/Layouts/AppLayout'
import Container from "@/Pages/Container";
import axios from "axios";
import DialogModal from "@/Pages/Modal";
import vSelect from 'vue-select';
import 'vue-select/dist/vue-select.css';
import Fuse from 'fuse.js';

export default {
    props: {
        students: Array,
        professors: Array,
        schools: Array,
    },

    components: {
        DialogModal,
        AppLayout,
        Container,
        vSelect,
    },

    data(){
        return {
            modals:{
                showModal: false,
                createModal: false,
                editModal: false,
                errorModal: false,
                title: null,
            },
            errors: "",
            student: Array,
            q:"",
            form: {
                personal_code:      null,
                name:               null,
                last_name:          null,
                grade_id:           null,
                section:            null,
                birth_date:         null,
                identification_document:        null,
                identification_document_number: null,
                class_schedule_id:  null,
                professor_dpi:      null,
                tutelary_name:      null,
                tutelary_dpi:       null,
                professor: {dpi: null},
            },
        }
    },

    methods: {

        getAll: function () {
            let url = 'api/student/';
            axios.get(url).then(response => {
                console.log(response.data.students);
                this.students = response.data.students
            });

        },
        showShowModal: function (personal_code) {

            let url = 'api/student/' + personal_code;
            axios.get(url).then(response => {
                console.log(response.data.student);
                this.form = response.data.student
                console.log(this.form);

                console.log(this.modals.showModal);

                this.modals.title = "Ver"
                this.modals.showModal = true;
            });


        },
        showCreateModal: function (){

            this.modals.title ="Crear";

            this.modals.createModal = true;

        },
        showEditModal: function (personal_code){
            let url = 'api/professor?' + this.form.professor_dpi;
            axios.get(url).then(response => {
                this.professors  = response.data.professors;
                console.log(this.professors);
                let url = 'api/student/' + personal_code;
                axios.get(url).then(response => {
                    console.log(response.data.student);
                    this.form = response.data.student

                    this.modals.title = "Editar"
                    this.modals.editModal = true;
                });

            });




        },
        submit(form){

            let url = 'api/student';
            axios.post(url, {
                ...form
            }).then(response =>{
                if(response.data.code === '1'){
                    this.cleanForm();
                    this.getAll();
                    this.modals.createModal = false;
                } else {
                    console.log(response.data.error);
                    this.errors = response.data.error;
                    this.showErrorModal();
                }
            }).catch(error =>{
                this.errors = error.response.data

            })

        },
        update(form) {
            let url = 'api/student/' + form.personal_code;
            axios.put(url, {
                ...form
            }).then(response =>{
                if(response.data.code === '1'){
                    this.cleanForm();
                    this.getAll();
                    this.modals.editModal = false;
                } else {
                    console.log(response.data.error);
                    this.errors = response.data.error;
                    this.showErrorModal(this.errors);
                }
            }).catch(error =>{
                this.errors = error.response.data

            })
        },

        cleanForm: function (){
            console.log("hello cleanform");
            this.form = {
                    personal_code:      null,
                    name:               null,
                    last_name:          null,
                    grade_id:           null,
                    section:            null,
                    birth_date:         null,
                    identification_document:        null,
                    identification_document_number: null,
                    class_schedule_id:  null,
                    professor_dpi:      null,
                    tutelary_name:      null,
                    tutelary_dpi:       null,
            };

        },

        showErrorModal: function () {
            this.modals.title = "Error";
            this.modals.errorModal = true;

        },
        professorSearch(options, search) {
            let url = 'api/professor?q=' + search;
            axios.get(url).then(response => {
                this.professors = response.data.professors;
            });

            const fuse = new Fuse(options, {
                keys: ['dpi', 'name', 'last_name'],
                shouldSort: true,
            })
            return search.length
                ? fuse.search(search).map(({ item }) => item)
                : fuse.list

        },
        schoolSearch(options, search) {
            let url = 'api/school?q=' + search;
            axios.get(url).then(response => {
                this.schools = response.data.schools;
            });

            const fuse = new Fuse(options, {
                keys: ['dpi', 'name', 'last_name'],
                shouldSort: true,
            })
            return search.length
                ? fuse.search(search).map(({ item }) => item)
                : fuse.list

        },
        changeSchool() {},

    },

    watch: {
        q: function (value) {
            this.$inertia.replace(this.route('student.index', {q: value}))
        }
    }


}
</script>
