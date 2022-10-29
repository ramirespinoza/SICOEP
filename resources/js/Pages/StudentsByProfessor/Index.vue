<template>
    <dashboard-container>
            <button
                v-on:click.prevent="getAll()"
                class="inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:shadow-outline-gray transition ease-in-out duration-150"
            >
                Generar Informe
            </button>
            <div class="col-span-6 sm:col-span-2">
                <!-- <label for="school_id" class="block text-sm font-medium text-gray-700">Escuela</label> -->
                <!-- <select
                    class="form-control mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm"
                    :required="true"
                    v-model="form.school_id"
                >
                    <option
                        v-for="school in schools"
                        v-bind:value="school.id"
                    >{{ school.name }}</option>
                </select> -->
            </div>

            <div v-for="schools_professor in schools_professors" :key="schools_professor.id" class="bg-white shadow-md rounded my-6">

                <label for="school_id" class="block text-sm font-medium text-gray-700"> <b>Escuela: </b> {{ schools_professor.name }} </label>

                <br />

                <table class="min-w-max w-full table-auto">
                    <thead>
                    <tr class="bg-gray-200 text-gray-600 uppercase text-sm leading-normal">
                        <th class="py-3 px-6 text-center">Catedrático</th>
                        <th class="py-3 px-6 text-center">Cantidad de alumnos</th>
                    </tr>
                    </thead>
                    <tbody class="text-gray-600 text-sm font-light">
                    <tr v-for="professor in schools_professor.professors" :key="professor.id" class="border-b border-gray-200 hover:bg-gray-100">
                        <td class="py-3 px-6 text-center">
                            <span class="font-medium">{{ professor.name }}</span>
                        </td>
                        <td class="py-3 px-6 text-center">
                            <span class="font-medium">{{ professor.count_student_enrollments }}</span>
                        </td>
                    </tr>
                    </tbody>
                </table>
            </div>
        </dashboard-container>
</template>

<script>
import AppLayout from '@/Layouts/AppLayout'
import Container from "@/Pages/Container";
import axios from "axios";
import dashboardContainer from "@/Pages/DashboardContainer";


export default {
    props: {
        students_professors: Array,
        schools_professors: Array
    },

    components: {
        dashboardContainer,
        AppLayout,
        Container,
    },

    created: function(){
        this.getSchools()
    },

    data(){
        return {
            errors: "",
            students_professor: Array,
            schools_professor: Array,
            schools: Array,
            form: {
                dpi:                null,
                name:               null,
                last_name:          null,
                school_id:          null,
            },
        }
    },

    methods: {

        getAll: function () {
            let url = 'api/students_by_professor';
            axios.get(url).then(response => {
                // console.log(response.data);

                this.schools_professors = response.data;

                this.schools_professors.forEach(element => {
                    console.log(element.professors);
                });
            });

        },
        getSchools: function (){
            let url = 'api/school/';
            axios.get(url).then(response => {
                console.log(response.data.schools);
                this.schools = response.data.schools;
            });
        }
    }

}
</script>
<style scoped>
.estilotexto {
    font-size: 50px;



}

</style>
