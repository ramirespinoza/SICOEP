<template>
    <app-layout>
        <template #header>
            <h1 class="font-semibold text-xl text-gray-800 leading-tight">
                Horarios de Examenes
            </h1>
        </template>


        <!-- List -->
        <container>
            <button
                v-on:click.prevent="showCreateModal(exam_schedule)"
                class="inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:shadow-outline-gray transition ease-in-out duration-150"
            >
                Nuevo Horario de exámenes
            </button>
            <div class="bg-white shadow-md rounded my-6">
                <table class="min-w-max w-full table-auto">
                    <thead>
                    <tr class="bg-gray-200 text-gray-600 uppercase text-sm leading-normal">
                        <th class="py-3 px-6 text-left">ID</th>
                        <th class="py-3 px-6 text-left">Curso</th>
                        <th class="py-3 px-6 text-center">Bimestre</th>
                        <th class="py-3 px-6 text-center">Fecha</th>
                        <th class="py-3 px-6 text-center">Actions</th>
                    </tr>
                    </thead>
                    <tbody class="text-gray-600 text-sm font-light">
                    <tr v-for="exam_schedule in exam_schedules" :key="exam_schedule.id" class="border-b border-gray-200 hover:bg-gray-100">
                        <td class="py-3 px-6 text-left whitespace-nowrap">
                            <span class="font-medium">{{ exam_schedule.id }}</span>
                        </td>
                        <td class="py-3 px-6 text-left">
                            <span class="font-medium">{{ exam_schedule.course.name}}</span>
                        </td>
                        <td class="py-3 px-6 text-center">
                            <span class="font-medium">{{ exam_schedule.bimestre }}</span>
                        </td>
                        <td class="py-3 px-6 text-center">
                            <span class="font-medium">{{ exam_schedule.date_ }}</span>
                        </td>
                        <td class="py-3 px-6 text-center">
                            <div class="flex item-center justify-center">
                                <button
                                    v-on:click.prevent="showShowModal(exam_schedule.id)"

                                    class="w-4 mr-2 transform hover:text-purple-500 hover:scale-110"
                                >
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                                    </svg>
                                </button>

                                <button
                                    v-on:click.prevent="showEditModal(exam_schedule.id)"
                                    class="w-4 mr-2 transform hover:text-purple-500 hover:scale-110"
                                >
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z" />
                                    </svg>
                                </button>

                                <inertia-link
                                    method="delete"
                                    :href="route('exam_schedule.destroy', exam_schedule.id)"
                                    class="w-4 mr-2 transform hover:text-purple-500 hover:scale-110"
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
                                    <label for="id" class="block text-sm font-medium text-gray-700">ID</label>
                                    <input
                                        type="text"
                                        name="id"
                                        id="id"
                                        v-model="form.id"
                                        autocomplete="street-address"
                                        disabled
                                        class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm bg-gray-100"
                                    />
                                </div>

                                <div class="col-span-6 sm:col-span-2">
                                    <label for="course_id" class="block text-sm font-medium text-gray-700">Curso</label>
                                    <input
                                        type="text"
                                        name="course_id"
                                        id="course_id"
                                        v-model="form.course.name"
                                        autocomplete="street-address"
                                        disabled
                                        class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm bg-gray-100"
                                    />
                                </div>

                                <div class="col-span-6 sm:col-span-2">
                                    <label for="bimestre" class="block text-sm font-medium text-gray-700">Descripcion</label>
                                    <input
                                        type="text"
                                        name="bimestre"
                                        id="bimestre"
                                        v-model="form.bimestre"
                                        autocomplete="street-address"
                                        disabled
                                        class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm bg-gray-100"
                                    />
                                </div>
                                <div class="col-span-6 sm:col-span-2">
                                    <label for="date_" class="block text-sm font-medium text-gray-700">Descripcion</label>
                                    <input
                                        type="datetime-local"
                                        name="date_"
                                        id="date_"
                                        v-model="form.date_"
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

                                <div class="col-span-3">
                                    <label for="course_id" class="block text-sm font-medium text-gray-700">Curso</label>
                                    <v-select
                                        v-model="form.course"
                                        :filter="courseSearch"
                                        :options="courses"
                                        :reduce="option => option.id"
                                        :get-option-label="course => course.id + ' ' + course.name"
                                        class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm"
                                        @input="form.course_id = form.course"
                                    >
                                        <template #option="{ id, name}">
                                            {{ id }}
                                            <br />
                                            <cite>{{ name }}</cite>
                                        </template>
                                    </v-select>

                                </div>

                                <div class="col-span-6 sm:col-span-2">
                                    <label for="bimestre" class="block text-sm font-medium text-gray-700">Bimestre</label>
                                    <input
                                        type="text"
                                        name="bimestre"
                                        id="bimestre"
                                        v-model="form.bimestre"
                                        autocomplete="street-address"
                                        class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm"
                                    />
                                </div>
                                <div class="col-span-6 sm:col-span-2">
                                    <label for="date_" class="block text-sm font-medium text-gray-700">Fecha</label>
                                    <input
                                        type="datetime-local"
                                        name="date_"
                                        id="date_"
                                        v-model="form.date_"
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

                                <div class="col-span-3">
                                    <label for="course_id" class="block text-sm font-medium text-gray-700">Curso</label>
                                    <v-select
                                        v-model="form.course"
                                        :filter="courseSearch"
                                        :options="courses"
                                        :reduce="option => option.id"
                                        :get-option-label="course => course.id + ' ' + course.name"
                                        @input="form.course_id = form.course"
                                        class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm"
                                    >
                                        <template #option="{ id, name}">
                                            {{ id }}
                                            <br />
                                            <cite>{{ name }}</cite>
                                        </template>
                                    </v-select>

                                </div>


                                <div class="col-span-6 sm:col-span-2">
                                    <label for="bimestre" class="block text-sm font-medium text-gray-700">Bimestre</label>
                                    <input
                                        type="text"
                                        name="bimestre"
                                        id="bimestre"
                                        v-model="form.bimestre"
                                        autocomplete="street-address"
                                        class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm"
                                    />
                                </div>
                                <div class="col-span-6 sm:col-span-2">
                                    <label for="date_" class="block text-sm font-medium text-gray-700">Fecha</label>
                                    <input
                                        type="datetime-local"
                                        name="date_"
                                        id="date_"
                                        v-model="form.date_"
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
        exam_schedules: Array,
        courses: Array,
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
                showModal:     false,
                createModal:   false,
                editModal:     false,
                errorModal:    false,
                title:         null,
            },
            errors: "",
            exam_schedule: Array,
            q:"",
            form: {
                id:                    null,
                course_id:             null,
                bimestre:              null,
                date_:                 null,
                course: {id: null},
            },
        }
    },

    methods: {

        getAll: function () {
            let url = 'api/exam_schedule/';
            axios.get(url).then(response => {
                console.log(response.data.exam_schedules);
                this.exam_schedules = response.data.exam_schedules
            });

        },
        showShowModal: function (id) {

            let url = 'api/exam_schedule/' + id;
            axios.get(url).then(response => {
                console.log(response.data.exam_schedule);
                this.form = response.data.exam_schedule
                console.log(this.form);

                console.log(this.modals.showModal);

                this.modals.title = "Ver"
                this.modals.showModal = true;
            });


        },
        showCreateModal: function (){

            this.cleanForm();

            this.modals.title ="Crear";

            this.modals.createModal = true;

        },
        showEditModal: function (id){
            let url = 'api/course?' + this.form.course_id;
            axios.get(url).then(response => {
                this.courses  = response.data.courses;
                console.log(this.courses);
                let url = 'api/exam_schedule/' + id;
                axios.get(url).then(response => {
                    console.log(response.data.exam_schedule);
                    this.form = response.data.exam_schedule

                    this.modals.title = "Editar"
                    this.modals.editModal = true;
                });

            });


        },
        submit(form){

            let url = 'api/exam_schedule';
            axios.post(url, {
                ...form
            }).then(response =>{
                if(response.data.code === '1'){
                    this.cleanForm();
                    this.getAll();
                    this.modals.createModal = false;
                    this.$page.props.flash.successful = "¡Horario de examenes registrado!"
                } else {
                    console.log(response.data.error);
                    this.errors = response.data.error;
                    this.$page.props.flash.danger = "No se pudo registrar el horario de examenes."
                }
            }).catch(error =>{
                this.errors = error.response.data

            })

        },
        update(form) {
            let url = 'api/exam_schedule/' + form.id;
            axios.put(url, {
                ...form
            }).then(response =>{
                if(response.data.code === '1'){
                    this.cleanForm();
                    this.getAll();
                    this.modals.editModal = false;
                    this.$page.props.flash.successful = "¡Horario de examense Actualizado"
                } else {
                    console.log(response.data.error);
                    this.errors = response.data.error;
                    this.$page.props.flash.danger = "No se pudo actualizar el horario de examenes."
                }
            }).catch(error =>{
                this.errors = error.response.data

            })
        },

        cleanForm: function (){
            console.log("hello cleanform");
            this.form = {
                id:                      null,
                course_id:               null,
                bimestre:                null,
                _date:                   null,

            };

        },

        showErrorModal: function () {
            this.modals.title = "Error";
            this.modals.errorModal = true;

        },
        courseSearch(options, search) {
            let url = 'api/course?q=' + search;
            axios.get(url).then(response => {
                this.courses = response.data.courses;
            });

            const fuse = new Fuse(options, {
                keys: ['id', 'name'],
                shouldSort: true,
            })
            return search.length
                ? fuse.search(search).map(({ item }) => item)
                : fuse.list

        }

    },
    watch: {
        q: function (value) {
            this.$inertia.replace(this.route('course.index', {q: value}))
        }
    }

}
</script>
