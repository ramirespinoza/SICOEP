<template>
    <app-layout>
        <!--
        <template #header>
            <h1 class="font-semibold text-xl text-gray-800 leading-tight">
                Nivel CNB
            </h1>
        </template>
-->
        <container>
                <button
                    v-on:click.prevent="showShowModal(CnbLevels.id)"
                    class="inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:shadow-outline-gray transition ease-in-out duration-150"
                >
                    Visualizar Nivel Cnb
                </button>
                <div class="bg-white shadow-md rounded my-6">
                    <table class="min-w-max w-full table-auto">
                        <thead>
                        <tr class="bg-gray-200 text-gray-600 uppercase text-sm leading-normal">
                            <th class="py-3 px-6 text-left">Id</th>
                            <th class="py-3 px-6 text-left">Nombre</th>
                            <th class="py-3 px-6 text-center">Descripción</th>

                        </tr>

                        </thead>
                        <tbody class="text-gray-600 text-sm font-light">
                        <tr v-for="CnbLevel in CnbLevels" :key="CnbLevel.id" class="border-b border-gray-200 hover:bg-gray-100">
                            <td class="py-3 px-6 text-left whitespace-nowrap">
                                <span class="font-medium">{{ CnbLevel.id }}</span>
                            </td>
                            <td class="py-3 px-6 text-left">
                                <span class="font-medium">{{ CnbLevel.name }}</span>
                            </td>
                            <td class="py-3 px-6 text-center">
                                <span class="font-medium">{{ CnbLevel.description }}</span>
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

                                        <div class="col-span-6 sm:col-span-2">
                                            <label for="id" class="block text-sm font-medium text-gray-700">Id</label>
                                            <input
                                                type="number"
                                                name="id"
                                                id="id"
                                                v-model="form.id"
                                                autocomplete="street-address"
                                                disabled
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
                                                disabled
                                                class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm bg-gray-100"
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
                                                disabled
                                                class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm bg-gray-100"
                                            />
                                        </div>



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
export  default {

    props: {
        CnbLevels: Array

    },

    components: {
        DialogModal,
        AppLayout,
        Container,
    },

    data(){
        return {
            modals:{
                showModal: false,
                errorModal: false,
                title: null,
            },
            errors: "",
            CnbLevel: Object,

            form: {
                id:                 null,
                name:               null,
                description:        null,


            },
        }
    },

    methods: {

        getAll: function () {
            let url = 'api/CnbLevel/';
            axios.get(url).then(response => {
                console.log(response.data.CnbLevels);
                this.schools = response.data.CnbLevels;
            });
        },
        showShowModal: function (id) {

            let url = 'api/CnbLevel/' + id;
            axios.get(url).then(response => {
                console.log(response.data.CnbLevel);
                this.form = response.data.CnbLevel;
                console.log(this.form);

                console.log(this.modals.showModal);

                this.modals.title = "Ver"
                this.modals.showModal = true;
            });

        },

        },

        cleanForm: function (){
            console.log("hello cleanform");
            this.form = {
                id:                 null,
                name:               null,
                description:        null,

            };

        },

        showErrorModal: function () {
            this.modals.title = "Error";
            this.modals.errorModal = true;

        }



}
</script>
