<template xmlns="http://www.w3.org/1999/html">
    <app-layout>
        <template #header>
            <h1 class="font-semibold text-xl text-gray-800 leading-tight">
                Inscripción de estudiantes
            </h1>
        </template>

        <!-- List -->
        <container>
                <button
                    v-on:click.prevent="showCreateModal(student_enrollments.id)"
                    class="inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:shadow-outline-gray transition ease-in-out duration-150"
                >
                    Inscribir estudiante
                </button>
                <input type="text" placeholder="Buscar..." v-model="q" class="mt-1 rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm">
                <div class="bg-white shadow-md rounded my-6">
                    <table v-if="student_enrollments.length!==0" class="min-w-max w-full table-auto">
                        <thead>
                        <tr class="bg-gray-200 text-gray-600 uppercase text-sm leading-normal">
                            <th class="py-3 px-6 text-left">ID Inscripción</th>
                            <th class="py-3 px-6 text-left">Código Personal</th>
                            <th class="py-3 px-6 text-left">Nombre</th>
                            <th class="py-3 px-6 text-center">Apellido</th>
                            <th class="py-3 px-6 text-center">Actions</th>
                        </tr>
                        </thead>
                        <tbody class="text-gray-600 text-sm font-light">
                        <tr v-for="student_enrollment in student_enrollments" :key="student_enrollment.id" class="border-b border-gray-200 hover:bg-gray-100">
                            <td class="py-3 px-6 text-left whitespace-nowrap">
                                <span class="font-medium">{{ student_enrollment.id }}</span>
                            </td>
                            <td class="py-3 px-6 text-left whitespace-nowrap">
                                <span class="font-medium">{{ student_enrollment.student_personal_code }}</span>
                            </td>
                            <td class="py-3 px-6 text-left">
                                <span class="font-medium">{{ student_enrollment.student.name }}</span>
                            </td>
                            <td class="py-3 px-6 text-center">
                                <span class="font-medium">{{ student_enrollment.student.last_name }}</span>
                            </td>
                            <td class="py-3 px-6 text-center">
                                <div class="flex item-center justify-center">
                                    <!--:href="route('student.show', student.personal_code)"-->
                                    <!-- @click="showShowModal(student.personal_code)" -->
                                    <!-- :href="showShowModal(student.personal_code)" -->

                                    <!-- v-on:click.prevent="showShowModal(student.personal_code)" -->
                                    <!-- :href="route('student.index')" -->
                                    <button
                                        v-on:click.prevent="showShowModal(student_enrollment.id)"

                                    class="w-4 mr-2 transform hover:text-purple-500 hover:scale-110"
                                    >
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                                        </svg>
                                    </button>

                                    <button
                                        v-on:click.prevent="showEditModal(student_enrollment.id)"
                                    class="w-4 mr-2 transform hover:text-purple-500 hover:scale-110"
                                    >
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z" />
                                        </svg>
                                    </button>

                                    <inertia-link
                                    method="delete"
                                    :href="route('student_enrollment.destroy', student_enrollment.id)"
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
                    <h1 v-if="student_enrollments.length===0"  class="font-semibold text-xl text-gray-800 leading-tight px-36">
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

                                        <div class="col-span-6 sm:col-span-1">
                                            <label for="personal_code" class="block text-sm font-medium text-gray-700">ID</label>
                                            <input
                                                type="text"
                                                name="personal_code"
                                                id="personal_code"
                                                v-model="form.id"
                                                disabled
                                                autocomplete="street-address"
                                                class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm bg-gray-100"
                                            />
                                        </div>

                                        <div class="col-span-6 sm:col-span-1">
                                            <label for="personal_code" class="block text-sm font-medium text-gray-700">Código Personal</label>
                                            <input
                                                type="text"
                                                name="personal_code"
                                                id="personal_code"
                                                v-model="form.student.personal_code"
                                                disabled
                                                autocomplete="street-address"
                                                class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm bg-gray-100"
                                            />
                                        </div>
                                        <div class="col-span-6 sm:col-span-2">
                                            <label for="name" class="block text-sm font-medium text-gray-700">Nombre</label>
                                            <input
                                                type="text"
                                                name="name"
                                                id="name"
                                                v-model="form.student.name"
                                                disabled
                                                autocomplete="street-address"
                                                class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm bg-gray-100"
                                            />
                                        </div>
                                        <div class="col-span-6 sm:col-span-2">
                                            <label for="last_name" class="block text-sm font-medium text-gray-700">Apellidos</label>
                                            <input
                                                type="text"
                                                name="last_name"
                                                id="last_name"
                                                v-model="form.student.last_name"
                                                disabled
                                                autocomplete="street-address"
                                                class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm bg-gray-100"
                                            />
                                        </div>
                                        <div class="col-span-6 sm:col-span-1">
                                            <label for="grade_id" class="block text-sm font-medium text-gray-700">Grado</label>
                                            <select
                                                class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm bg-gray-100"
                                                :required="true"
                                                disabled
                                                v-model="form.grade_id"
                                            >
                                                <option
                                                    v-for="grade in grades"
                                                    v-bind:value="grade.id"
                                                    :key="grade.id"
                                                >{{ grade.name }}</option>
                                            </select>
                                        </div><div class="col-span-6 sm:col-span-1">
                                        <label for="section" class="block text-sm font-medium text-gray-700">Sección</label>
                                        <select
                                            class="form-control mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm bg-gray-100"
                                            :required="true"
                                            disabled
                                            v-model="form.section"
                                        >
                                            <option value="A">A</option><option value="B">B</option><option value="C">C</option>
                                            <option value="D">D</option><option value="E">E</option><option value="F">F</option>
                                        </select>
                                    </div>

                                        <div class="col-span-6 sm:col-span-1">
                                            <label for="birth_date" class="block text-sm font-medium text-gray-700">Fecha de inscripción</label>
                                            <input
                                                type="date"
                                                name="birth_date"
                                                id="birth_date"
                                                v-model="form.enrollment_date"
                                                disabled
                                                autocomplete="street-address"
                                                class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm bg-gray-100"
                                            />
                                        </div>

                                        <div class="col-span-6 sm:col-span-1">
                                            <label for="birth_date" class="block text-sm font-medium text-gray-700">Fecha de nacimiento</label>
                                            <input
                                                type="date"
                                                name="birth_date"
                                                id="birth_date"
                                                v-model="form.student.birth_date"
                                                disabled
                                                autocomplete="street-address"
                                                class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm bg-gray-100"
                                            />
                                        </div>

                                        <div class="col-span-6 sm:col-span-1">
                                            <label for="class_schedule_id" class="block text-sm font-medium text-gray-700">Horario de clases</label>
                                            <select
                                                class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm bg-gray-100"
                                                :required="true"
                                                disabled
                                                v-model="form.class_schedule_id"
                                            >
                                                <option
                                                    v-for="class_schedule in class_schedules"
                                                    v-bind:value="class_schedule.id"
                                                    :key="class_schedule.id"
                                                >{{ class_schedule.journey }}</option>
                                            </select>
                                        </div>

                                        <div class="col-span-6 sm:col-span-1">
                                            <label for="identification_document" class="block text-sm font-medium text-gray-700">Doc. identificación</label>
                                            <input
                                                type="text"
                                                name="identification_document"
                                                id="identification_document"
                                                v-model="form.student.identification_document"
                                                disabled
                                                autocomplete="street-address"
                                                class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm bg-gray-100"
                                            />
                                        </div>
                                        <div class="col-span-6 sm:col-span-1">
                                            <label for="identification_document_number" class="block text-sm font-medium text-gray-700">No. doc. identificación</label>
                                            <input
                                                type="number"
                                                name="identification_document_number"
                                                id="identification_document_number"
                                                v-model="form.student.identification_document_number"
                                                disabled
                                                autocomplete="street-address"
                                                class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm bg-gray-100"
                                            />
                                        </div>
                                        <div class="col-span-1">
                                            <label for="professor_dpi" class="block text-sm font-medium text-gray-700">Departamento</label>
                                            <select
                                                class="form-control mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm bg-gray-100"
                                                :required="true"
                                                disabled
                                                v-model="form.professor.school.municipality.departament.id"
                                                @change="changeMunicipality"

                                            >
                                                <option
                                                    v-for="departament in departaments"
                                                    v-bind:value="departament.id"
                                                    :key="departament.id"
                                                >{{ departament.name }}</option>
                                            </select>

                                        </div>
                                        <div class="col-span-2">
                                            <label for="professor_dpi" class="block text-sm font-medium text-gray-700">Municipio</label>
                                            <select
                                                class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm bg-gray-100"
                                                :required="true"
                                                v-model="form.professor.school.municipality.id"
                                                disabled
                                                @change="changeSchool"
                                            >
                                                <option
                                                    v-for="municipality in municipalities"
                                                    v-bind:value="municipality.id"
                                                    :key="municipality.id"
                                                    disabled
                                                >{{ municipality.name }}</option>
                                            </select>
                                        </div>
                                        <div class="col-span-2">
                                            <label for="professor_dpi" class="block text-sm font-medium text-gray-700">Escuela</label>
                                            <select
                                                class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm bg-gray-100"
                                                :required="true"
                                                v-model="form.professor.school.id"
                                                disabled
                                                @change="changeProfessor"
                                            >
                                                <option
                                                    v-for="school in schools"
                                                    v-bind:value="school.id"
                                                    :key="school.id"
                                                >{{ school.name }}</option>
                                            </select>

                                        </div>
                                        <div class="col-span-3">
                                            <label for="professor_dpi" class="block text-sm font-medium text-gray-700">Catedrático</label>
                                            <v-select
                                                v-model="professor"
                                                disabled
                                                :filter="professorSearch"
                                                :options="professors"
                                                class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm bg-gray-100"


                                                :get-option-label="professor => professor.dpi + ' ' + professor.name + ' ' + professor.last_name"
                                                @input="professorChanged"
                                            >
                                                <template #option="{ dpi, name, last_name }">
                                                    {{ dpi }}
                                                    <br />
                                                    <cite>{{ name }} {{ last_name }}</cite>
                                                </template>
                                            </v-select>
                                        </div>
                                        <div class="col-span-6 sm:col-span-2">
                                            <label for="tutelary_name" class="block text-sm font-medium text-gray-700">Tutelar</label>
                                            <input
                                                disabled
                                                type="text"
                                                name="tutelary_name"
                                                id="tutelary_name"
                                                v-model="form.student.tutelary_name"
                                                autocomplete="street-address"
                                                class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm bg-gray-100"
                                            />
                                        </div>
                                        <div class="col-span-6 sm:col-span-1">
                                            <label for="tutelary_dpi" class="block text-sm font-medium text-gray-700">DPI del tutelar</label>
                                            <input
                                                type="number"
                                                disabled
                                                name="tutelary_dpi"
                                                id="tutelary_dpi"
                                                v-model="form.student.tutelary_dpi"
                                                autocomplete="street-address"
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
                                    <label for="personal_code" class="block text-sm font-medium text-gray-700">Código Personal</label>
                                    <input
                                        type="text"
                                        name="personal_code"
                                        id="personal_code"
                                        v-model="form.student_personal_code"
                                        :required="true"
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
                                        v-model="form.student.name"
                                        disabled
                                        autocomplete="street-address"
                                        class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm bg-gray-100"
                                    />
                                </div>
                                <div class="col-span-6 sm:col-span-2">
                                    <label for="last_name" class="block text-sm font-medium text-gray-700">Apellidos</label>
                                    <input
                                        type="text"
                                        name="last_name"
                                        id="last_name"
                                        v-model="form.student.last_name"
                                        disabled
                                        autocomplete="street-address"
                                        class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm bg-gray-100"
                                    />
                                </div>
                                <div class="col-span-6 sm:col-span-1">
                                    <label for="grade_id" class="block text-sm font-medium text-gray-700">Grado</label>
                                    <select
                                        class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm"
                                        :required="true"
                                        v-model="form.grade_id"
                                    >
                                        <option
                                            v-for="grade in grades"
                                            v-bind:value="grade.id"
                                            :key="grade.id"
                                        >{{ grade.name }}</option>
                                    </select>
                                </div><div class="col-span-6 sm:col-span-1">
                                <label for="section" class="block text-sm font-medium text-gray-700">Sección</label>
                                <select
                                    class="form-control mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm"
                                    :required="true"
                                    v-model="form.section"
                                >
                                    <option value="A">A</option><option value="B">B</option><option value="C">C</option>
                                    <option value="D">D</option><option value="E">E</option><option value="F">F</option>
                                </select>
                            </div>

                                <div class="col-span-6 sm:col-span-1">
                                    <label for="birth_date" class="block text-sm font-medium text-gray-700">Fecha de nacimiento</label>
                                    <input
                                        type="date"
                                        name="birth_date"
                                        id="birth_date"
                                        v-model="form.student.birth_date"
                                        disabled
                                        autocomplete="street-address"
                                        class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm bg-gray-100"
                                    />
                                </div>

                                <div class="col-span-6 sm:col-span-1">
                                    <label for="class_schedule_id" class="block text-sm font-medium text-gray-700">Horario de clases</label>
                                    <select
                                        class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm"
                                        :required="true"
                                        v-model="form.class_schedule_id"
                                    >
                                        <option
                                            v-for="class_schedule in class_schedules"
                                            v-bind:value="class_schedule.id"
                                            :key="class_schedule.id"
                                        >{{ class_schedule.journey }}</option>
                                    </select>
                                </div>

                                <div class="col-span-6 sm:col-span-1">
                                    <label for="identification_document" class="block text-sm font-medium text-gray-700">Doc. identificación</label>
                                    <input
                                        type="text"
                                        name="identification_document"
                                        id="identification_document"
                                        v-model="form.student.identification_document"
                                        disabled
                                        autocomplete="street-address"
                                        class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm bg-gray-100"
                                    />
                                </div>
                                <div class="col-span-6 sm:col-span-1">
                                    <label for="identification_document_number" class="block text-sm font-medium text-gray-700">No. doc. identificación</label>
                                    <input
                                        type="number"
                                        name="identification_document_number"
                                        id="identification_document_number"
                                        v-model="form.student.identification_document_number"
                                        disabled
                                        autocomplete="street-address"
                                        class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm bg-gray-100"
                                    />
                                </div>
                                <div class="col-span-2">
                                    <label for="professor_dpi" class="block text-sm font-medium text-gray-700">Departamento</label>
                                    <select
                                        class="form-control mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm"
                                        :required="true"
                                        v-model="form.professor.school.municipality.departament.id"
                                        @change="changeMunicipality"

                                    >
                                        <option
                                            v-for="departament in departaments"
                                            v-bind:value="departament.id"
                                            :key="departament.id"
                                        >{{ departament.name }}</option>
                                    </select>

                                </div>
                                <div class="col-span-2">
                                    <label for="professor_dpi" class="block text-sm font-medium text-gray-700">Municipio</label>
                                    <select
                                        class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm"
                                        :required="true"
                                        v-model="form.professor.school.municipality.id"
                                        @change="changeSchool"
                                    >
                                        <option
                                            v-for="municipality in municipalities"
                                            v-bind:value="municipality.id"
                                            :key="municipality.id"
                                        >{{ municipality.name }}</option>
                                    </select>
                                </div>
                                <div class="col-span-2">
                                    <label for="professor_dpi" class="block text-sm font-medium text-gray-700">Escuela</label>
                                    <select
                                        class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm"
                                        :required="true"
                                        v-model="form.professor.school.id"
                                        @change="changeProfessor"
                                    >
                                        <option
                                            v-for="school in schools"
                                            v-bind:value="school.id"
                                            :key="school.id"
                                        >{{ school.name }}</option>
                                    </select>

                                </div>
                                <div class="col-span-3">
                                    <label for="professor_dpi" class="block text-sm font-medium text-gray-700">Catedrático</label>
                                    <v-select
                                        v-model="professor"
                                        :filter="professorSearch"
                                        :options="professors"

                                        :get-option-label="professor => professor.dpi + ' ' + professor.name + ' ' + professor.last_name"
                                        @input="professorChanged"
                                        class="form-control mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm"
                                    >
                                        <template #option="{ dpi, name, last_name }">
                                            {{ dpi }}
                                            <br />
                                            <cite>{{ name }} {{ last_name }}</cite>
                                        </template>
                                    </v-select>
                                </div>
                                <div class="col-span-6 sm:col-span-2">
                                    <label for="tutelary_name" class="block text-sm font-medium text-gray-700">Tutelar</label>
                                    <input
                                        type="text"
                                        name="tutelary_name"
                                        id="tutelary_name"
                                        v-model="form.student.tutelary_name"
                                        autocomplete="street-address"
                                        class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm"
                                    />
                                </div>
                                <div class="col-span-6 sm:col-span-1">
                                    <label for="tutelary_dpi" class="block text-sm font-medium text-gray-700">DPI del tutelar</label>
                                    <input
                                        type="number"
                                        name="tutelary_dpi"
                                        id="tutelary_dpi"
                                        v-model="form.student.tutelary_dpi"
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

                                <div class="col-span-6 sm:col-span-1">
                                    <label for="personal_code" class="block text-sm font-medium text-gray-700">ID</label>
                                    <input
                                        type="text"
                                        name="personal_code"
                                        id="personal_code"
                                        v-model="form.id"
                                        disabled
                                        autocomplete="street-address"
                                        class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm bg-gray-100"
                                    />
                                </div>

                                <div class="col-span-6 sm:col-span-1">
                                    <label for="personal_code" class="block text-sm font-medium text-gray-700">Código Personal</label>
                                    <input
                                        type="text"
                                        name="personal_code"
                                        id="personal_code"
                                        v-model="form.student.personal_code"
                                        disabled
                                        autocomplete="street-address"
                                        class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm bg-gray-100"
                                    />
                                </div>
                                <div class="col-span-6 sm:col-span-2">
                                    <label for="name" class="block text-sm font-medium text-gray-700">Nombre</label>
                                    <input
                                        type="text"
                                        name="name"
                                        id="name"
                                        v-model="form.student.name"
                                        disabled
                                        autocomplete="street-address"
                                        class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm bg-gray-100"
                                    />
                                </div>
                                <div class="col-span-6 sm:col-span-2">
                                    <label for="last_name" class="block text-sm font-medium text-gray-700">Apellidos</label>
                                    <input
                                        type="text"
                                        name="last_name"
                                        id="last_name"
                                        v-model="form.student.last_name"
                                        disabled
                                        autocomplete="street-address"
                                        class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm bg-gray-100"
                                    />
                                </div>
                                <div class="col-span-6 sm:col-span-1">
                                    <label for="grade_id" class="block text-sm font-medium text-gray-700">Grado</label>
                                    <select
                                        class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm"
                                        :required="true"
                                        v-model="form.grade_id"
                                    >
                                        <option
                                            v-for="grade in grades"
                                            v-bind:value="grade.id"
                                            :key="grade.id"
                                        >{{ grade.name }}</option>
                                    </select>
                                </div><div class="col-span-6 sm:col-span-1">
                                <label for="section" class="block text-sm font-medium text-gray-700">Sección</label>
                                <select
                                    class="form-control mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm"
                                    :required="true"
                                    v-model="form.section"
                                >
                                    <option value="A">A</option><option value="B">B</option><option value="C">C</option>
                                    <option value="D">D</option><option value="E">E</option><option value="F">F</option>
                                </select>
                            </div>

                                <div class="col-span-6 sm:col-span-1">
                                    <label for="birth_date" class="block text-sm font-medium text-gray-700">Fecha de inscripción</label>
                                    <input
                                        type="date"
                                        name="birth_date"
                                        id="birth_date"
                                        v-model="form.enrollment_date"
                                        disabled
                                        autocomplete="street-address"
                                        class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm bg-gray-100"
                                    />
                                </div>

                                <div class="col-span-6 sm:col-span-1">
                                    <label for="birth_date" class="block text-sm font-medium text-gray-700">Fecha de nacimiento</label>
                                    <input
                                        type="date"
                                        name="birth_date"
                                        id="birth_date"
                                        v-model="form.student.birth_date"
                                        disabled
                                        autocomplete="street-address"
                                        class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm bg-gray-100"
                                    />
                                </div>

                                <div class="col-span-6 sm:col-span-1">
                                    <label for="class_schedule_id" class="block text-sm font-medium text-gray-700">Horario de clases</label>
                                    <select
                                        class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm"
                                        :required="true"
                                        v-model="form.class_schedule_id"
                                    >
                                        <option
                                            v-for="class_schedule in class_schedules"
                                            v-bind:value="class_schedule.id"
                                            :key="class_schedule.id"
                                        >{{ class_schedule.journey }}</option>
                                    </select>
                                </div>

                                <div class="col-span-6 sm:col-span-1">
                                    <label for="identification_document" class="block text-sm font-medium text-gray-700">Doc. identificación</label>
                                    <input
                                        type="text"
                                        name="identification_document"
                                        id="identification_document"
                                        v-model="form.student.identification_document"
                                        disabled
                                        autocomplete="street-address"
                                        class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm bg-gray-100"
                                    />
                                </div>
                                <div class="col-span-6 sm:col-span-1">
                                    <label for="identification_document_number" class="block text-sm font-medium text-gray-700">No. doc. identificación</label>
                                    <input
                                        type="number"
                                        name="identification_document_number"
                                        id="identification_document_number"
                                        v-model="form.student.identification_document_number"
                                        disabled
                                        autocomplete="street-address"
                                        class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm bg-gray-100"
                                    />
                                </div>
                                <div class="col-span-1">
                                    <label for="professor_dpi" class="block text-sm font-medium text-gray-700">Departamento</label>
                                    <select
                                        class="form-control mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm"
                                        :required="true"
                                        v-model="form.professor.school.municipality.departament.id"
                                        @change="changeMunicipality"

                                    >
                                        <option
                                            v-for="departament in departaments"
                                            v-bind:value="departament.id"
                                            :key="departament.id"
                                        >{{ departament.name }}</option>
                                    </select>

                                </div>
                                <div class="col-span-2">
                                    <label for="professor_dpi" class="block text-sm font-medium text-gray-700">Municipio</label>
                                    <select
                                        class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm"
                                        :required="true"
                                        v-model="form.professor.school.municipality.id"
                                        @change="changeSchool"
                                    >
                                        <option
                                            v-for="municipality in municipalities"
                                            v-bind:value="municipality.id"
                                            :key="municipality.id"
                                        >{{ municipality.name }}</option>
                                    </select>
                                </div>
                                <div class="col-span-2">
                                    <label for="professor_dpi" class="block text-sm font-medium text-gray-700">Escuela</label>
                                    <select
                                        class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm"
                                        :required="true"
                                        v-model="form.professor.school.id"
                                        @change="changeProfessor"
                                    >
                                        <option
                                            v-for="school in schools"
                                            v-bind:value="school.id"
                                            :key="school.id"
                                        >{{ school.name }}</option>
                                    </select>

                                </div>
                                <div class="col-span-3">
                                    <label for="professor_dpi" class="block text-sm font-medium text-gray-700">Catedrático</label>
                                    <v-select
                                        v-model="professor"
                                        :filter="professorSearch"
                                        :options="professors"
                                        class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm"
                                        :get-option-label="professor => professor.dpi + ' ' + professor.name + ' ' + professor.last_name"
                                        @input="professorChanged"
                                    >
                                        <template #option="{ dpi, name, last_name }">
                                            {{ dpi }}
                                            <br />
                                            <cite>{{ name }} {{ last_name }}</cite>
                                        </template>
                                    </v-select>
                                </div>
                                <div class="col-span-6 sm:col-span-2">
                                    <label for="tutelary_name" class="block text-sm font-medium text-gray-700">Tutelar</label>
                                    <input
                                        type="text"
                                        name="tutelary_name"
                                        id="tutelary_name"
                                        v-model="form.student.tutelary_name"
                                        autocomplete="street-address"
                                        class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm"
                                    />
                                </div>
                                <div class="col-span-6 sm:col-span-1">
                                    <label for="tutelary_dpi" class="block text-sm font-medium text-gray-700">DPI del tutelar</label>
                                    <input
                                        type="number"
                                        name="tutelary_dpi"
                                        id="tutelary_dpi"
                                        v-model="form.student.tutelary_dpi"
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
import moment from 'moment';
import Fuse from 'fuse.js';

export default {
    props: {
        student_enrollments: Array,
        professors: Array,
    },

    components: {
        DialogModal,
        AppLayout,
        Container,
        vSelect,
    },
    created: function(){
        this.getData();
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
            student_enrollment: Array,
            municipalities: Array,
            departaments: Array,
            schools: Array,
            grades: Array,
            professor: Object,
            class_schedules: Array,
            q:"",
            form: {
                student_personal_code:      null,
                grade_id:           null,
                section:            null,
                class_schedule_id:  null,
                professor_dpi:      null,

                professor: {
                    dpi: null,
                    school:  {
                        id:null,
                        municipality: {
                            id: null,
                            departament: Object,
                        },
                    }
                },
                student: {
                    personal_code:      null,
                    name:               null,
                    last_name:          null,
                    birth_date:         null,
                    identification_document:        null,
                    identification_document_number: null,
                    tutelary_name:      null,
                    tutelary_dpi:       null,
                },
                grade: {
                    id: null,
                    name: null,
                },
            },
        }
    },

    methods: {

        getAll: function () {
            let url = 'api/student_enrollment/';
            axios.get(url).then(response => {
                console.log(response.data.student_enrollments);
                this.student_enrollments = response.data.student_enrollments
            });

        },

        /*************************** MODALS */
        showShowModal: function (id) {
            let url = 'api/student_enrollment/' + id;
            axios.get(url).then(response => {
                console.log(response.data.student_enrollment);
                this.form = response.data.student_enrollment
                this.form.student.birth_date = moment(this.form.student.birth_date).format("Y-MM-DD");
                console.log(this.form);

                console.log(this.modals.showModal);

                //Actualización options
                this.changeMunicipality();
                this.changeSchool();
                this.professor = this.form.professor;

                this.modals.title = "Ver"
                this.modals.showModal = true;
            });
        },
        showCreateModal: function (){

            this.cleanForm();
            this.professor="";

            this.modals.title ="Crear";

            this.modals.createModal = true;

        },
        showEditModal: function (id){

            let url = 'api/student_enrollment/' + id;
            axios.get(url).then(response => {
                console.log(response.data.student_enrollment);
                this.form = response.data.student_enrollment;

                this.form.student.birth_date = moment(this.form.student.birth_date).format("Y-MM-DD");

                this.modals.title = "Editar"
                this.modals.editModal = true;

                //Actualización options
                this.changeMunicipality();
                this.changeSchool();
                this.professor = this.form.professor;

                let url = 'api/professor?q=' + this.form.professor_dpi;
                console.log('profesos_dpi', this.form.professor_dpi);
                axios.get(url).then(response => {
                    //this.$emit('professors', response.data.professors);
                    console.log(this.professors);
                    this.professors  = response.data.professors;
                });

            });


        },

        showErrorModal: function () {
            this.modals.title = "Error";
            this.modals.errorModal = true;

        },

        /*************************** FUNCTIONS */
        submit(form){

            let url = 'api/student_enrollment';
            axios.post(url, {
                ...form
            }).then(response =>{
                if(response.data.code === '1'){
                    this.cleanForm();
                    this.getAll();
                    this.modals.createModal = false;
                    this.$page.props.flash.successful = "¡Inscripción Registrado"
                } else {
                    console.log(response.data.error);
                    this.errors = response.data.error;

                    this.$page.props.flash.danger = "No se pudo registrar la inscripción";
                }
            }).catch(error =>{
                this.errors = error.response.data

            })

        },
        update(form) {
            let url = 'api/student_enrollment/' + form.id;
            axios.put(url, {
                ...form
            }).then(response =>{
                if(response.data.code === '1'){
                    this.cleanForm();
                    this.getAll();
                    this.modals.editModal = false;

                    this.$page.props.flash.successful = "¡Inscripción Actualizada"
                } else {
                    console.log(response.data.error);
                    this.errors = response.data.error;

                    this.$page.props.flash.danger = "No se pudo registrar la actualización."
                }
            }).catch(error =>{
                this.errors = error.response.data

            })
        },

        cleanForm: function (){
            console.log("hello cleanform");
            this.form = {
                student_personal_code:      null,
                grade_id:           null,
                section:            null,
                class_schedule_id:  null,
                professor_dpi:      null,

                professor: {
                    dpi: null,
                    school:  {
                        id:null,
                        municipality: {
                            id: null,
                            departament: Object,
                        },
                    }
                },
                student: {
                    personal_code:      null,
                    name:               null,
                    last_name:          null,
                    birth_date:         null,
                    identification_document:        null,
                    identification_document_number: null,
                    tutelary_name:      null,
                    tutelary_dpi:       null,
                },
                grade: {
                    id: null,
                    name: null,
                },

            };

        },


        /*************************** SEARCH */
        professorSearch(options, search) {
            let url = 'api/professor?q=' + search;
            axios.get(url).then(response => {
                this.professors = response.data.professors;
                //this.$emit('professors', response.data.professors);
            });

            const fuse = new Fuse(options, {
                keys: ['dpi', 'name', 'last_name'],
                shouldSort: false,
            })
            return search.length
                ? fuse.search(search).map(({ item }) => item)
                : fuse.list
        },

        studentSearch(options, search) {
            let url = 'api/student?q=' + search;
            axios.get(url).then(response => {
                this.student_enrollments = response.data.student_enrollments;
                //this.$emit('professors', response.data.professors);
            });

            const fuse = new Fuse(options, {
                keys: ['personal_code', 'name', 'last_name'],
                shouldSort: false,
            })
            return search.length
                ? fuse.search(search).map(({ item }) => item)
                : fuse.list
        },

        /*************************** CHANGE VALUES */
        changeSchool() {
            let url = 'api/municipality/' + this.form.professor.school.municipality.id;
            axios.get(url).then(response => {
                this.schools = response.data.municipality.schools;
            });

        },
        changeProfessor() {
            let url = 'api/school/' + this.form.professor.school.id;
            axios.get(url).then(response => {
                this.professors = response.data.school.professors;
            });

        },

        professorChanged() {
            this.form.professor_dpi = this.professor.dpi;
            let url = 'api/professor/' + this.professor.dpi;
            axios.get(url).then(response => {
                console.log(response.data.departaments);
                this.form.professor = response.data.professor;
                console.log(this.professor);
                console.log(this.form.professor)
                this.changeMunicipality();
                this.changeSchool();

            });
        },
        getDepartaments: function (){
            let url = 'api/departament/';
            axios.get(url).then(response => {
                console.log(response.data.departaments);
                this.departaments = response.data.departaments;
            });
        },
        getClassSchedules: function (){
            let url = 'api/class_schedule/';
            axios.get(url).then(response => {
                this.class_schedules = response.data;
            });
        },
        getGrades: function (){
            let url = 'api/grade/';
            axios.get(url).then(response => {
                console.log(response.data.departaments);
                this.grades = response.data;
            });
        },
        changeMunicipality: function (){
            console.log('chang muni', this.form.professor.school.municipality.departament.id);
            this.municipalities = this.departaments[this.form.professor.school.municipality.departament.id - 1].municipalities;
            this.schools = Array;
        },

        getData : function() {
            this.getDepartaments();
            this.getClassSchedules();
            this.getGrades();
        }

    },

    watch: {
        q: function (value) {
            this.$inertia.replace(this.route('student_enrollment.index', {q: value}))
        }
    }


}
</script>
