<template>
    <app-layout>
        <template #header>
            <h1 class="font-semibold text-xl text-gray-800 leading-tight">
                Actividades
            </h1>
        </template>

        <container>
                <button
                    v-on:click.prevent="showCreateModal()"
                    class="inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:shadow-outline-gray transition ease-in-out duration-150"
                >
                    Nueva Actividad
                </button>
                <div class="bg-white shadow-md rounded my-6">
                    <table class="min-w-max w-full table-auto">
                        <thead>
                        <tr class="bg-gray-200 text-gray-600 uppercase text-sm leading-normal">
                            <th class="py-3 px-6 text-left">ID</th>
                            <th class="py-3 px-6 text-left">Nombre</th>
                            <th class="py-3 px-6 text-center">Descripción</th>
                            <th class="py-3 px-6 text-center">Actions</th>
                        </tr>
                        </thead>
                        <tbody class="text-gray-600 text-sm font-light">
                        <tr v-for="activity in activities" :key="activity.id" class="border-b border-gray-200 hover:bg-gray-100">
                            <td class="py-3 px-6 text-left whitespace-nowrap">
                                <span class="font-medium">{{ activity.id }}</span>
                            </td>
                            <td class="py-3 px-6 text-left">
                                <span class="font-medium">{{ activity.name }}</span>
                            </td>
                            <td class="py-3 px-6 text-center">
                                <span class="font-medium">{{ activity.description }}</span>
                            </td>
                            <td class="py-3 px-6 text-center">
                                <div class="flex item-center justify-center">
                                    <!--:href="route('student.show', student.personal_code)"-->
                                    <!-- @click="showShowModal(student.personal_code)" -->
                                    <!-- :href="showShowModal(student.personal_code)" -->

                                    <!-- v-on:click.prevent="showShowModal(student.personal_code)" -->
                                    <!-- :href="route('student.index')" -->
                                    <button
                                        v-on:click.prevent="showShowModal(activity.id)"

                                    class="w-4 mr-2 transform hover:text-purple-500 hover:scale-110"
                                    >
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                                        </svg>
                                    </button>

                                    <button
                                        v-on:click.prevent="showEditModal(activity.id)"
                                    class="w-4 mr-2 transform hover:text-purple-500 hover:scale-110"
                                    >
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z" />
                                        </svg>
                                    </button>

                                    <inertia-link
                                    method="delete"
                                    :href="route('activity.destroy', activity.id)"
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
                                            <label for="personal_code" class="block text-sm font-medium text-gray-700">Descripción</label>
                                            <input
                                                type="text"
                                                name="description"
                                                id="description"
                                                v-model="form.description"
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

                                <div class="col-span-6 sm:col-span-3">
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
                                <div class="col-span-6 sm:col-span-3">
                                    <label for="description" class="block text-sm font-medium text-gray-700">Descripción</label>
                                    <input
                                        type="text"
                                        name="description"
                                        id="description"
                                        v-model="form.description"
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
                                    <label for="id" class="block text-sm font-medium text-gray-700">ID</label>
                                    <input
                                        type="text"
                                        name="id"
                                        id="id"
                                        v-model="form.id"
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
                                        v-model="form.name"
                                        autocomplete="street-address"
                                        class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm"
                                    />
                                </div>
                                <div class="col-span-6 sm:col-span-2">
                                    <label for="description" class="block text-sm font-medium text-gray-700">Descripción</label>
                                    <input
                                        type="text"
                                        name="description"
                                        id="description"
                                        v-model="form.description"
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
export default {
    props: {
        activities: Array
    },

    components: {
        DialogModal,
        AppLayout,
        Container,
    },

    data(){
        return {
            modals:{
                showModal:      false,
                createModal:    false,
                editModal:      false,
                errorModal:     false,
                title:          null,
            },
            errors: "",
            activity: Array,
            form: {
                id:             null,
                name:           null,
                description:    null,
            },
        }
    },

    methods: {

        getAll: function () {
            let url = 'api/activity/';
            axios.get(url).then(response => {
                console.log(response.data.activities);
                this.activities = response.data.activities
            });
        },

        showShowModal: function (id) {

            let url = 'api/activity/' + id;
            axios.get(url).then(response => {
                this.form = response.data.activity

                this.modals.title = "Ver"
                this.modals.showModal = true;
            });
        },

        showCreateModal: function (){

            this.cleanForm();
            this.modals.title = "Crear";
            this.modals.createModal = true;
        },

        showEditModal: function (id){

            let url = 'api/activity/' + id;
            axios.get(url).then(response => {
                this.form = response.data.activity

                this.modals.title = "Editar"
                this.modals.editModal = true;
            });
        },

        submit(form){

            let url = 'api/activity';

            axios.post(url, {
                ...form
            }).then(response =>{
                if(response.data.code === '1'){
                    this.cleanForm();
                    this.getAll();
                    this.modals.createModal = false;
                } else {
                    this.errors = response.data.error;
                    this.showErrorModal();
                }
            }).catch(error =>{
                this.errors = error.response.data
            })
        },

        update(form) {
            let url = 'api/activity/' + form.id;

            axios.put(url, {
                ...form
            }).then(response =>{
                if(response.data.code === '1'){
                    this.cleanForm();
                    this.getAll();
                    this.modals.editModal = false;
                } else {
                    this.errors = response.data.error;
                    this.showErrorModal();
                }
            }).catch(error =>{
                this.errors = error.response.data

            })
        },

        cleanForm: function (){

            this.form = {
                id:             null,
                name:           null,
                description:    null,
            };
        },

        showErrorModal: function () {

            this.modals.title = "Error";
            this.modals.errorModal = true;
        }
    }


}
</script>
