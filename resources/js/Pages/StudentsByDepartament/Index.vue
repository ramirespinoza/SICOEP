<template>
    <dashboard-container>
        <div class="col-span-6 sm:col-span-2">
        </div>

        <div v-for="students_by_departament in students_by_departaments" :key="students_by_departament.id" class="bg-white shadow-md rounded my-6">

            <label for="school_id" class="block text-sm font-medium text-gray-700"> <b>Departamneto: </b> {{ students_by_departament.name }} </label>

            <br />

            <table class="min-w-max w-full table-auto">
                <thead>
                <tr class="bg-gray-200 text-gray-600 uppercase text-sm leading-normal">
                    <th class="py-3 px-6 text-center">Municipios</th>
                    <th class="py-3 px-6 text-center">Cantidad de alumnos</th>
                </tr>
                </thead>
                <tbody class="text-gray-600 text-sm font-light">
                <tr v-for="municipality in students_by_departament.municipalities" :key="municipality.id" class="border-b border-gray-200 hover:bg-gray-100">
                    <td class="py-3 px-6 text-center">
                        <span class="font-medium">{{ municipality.name }}</span>
                    </td>
                    <td class="py-3 px-6 text-center">
                        <span class="font-medium">{{ municipality.count_student_enrollments }}</span>
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
        students_by_departaments: Array,
    },

    components: {
        dashboardContainer,
        AppLayout,
        Container,
    },

    created() {
        this.getAll();
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
            let url = 'api/students_by_department_municipality?department=true';
            axios.get(url).then(response => {
                // console.log(response.data);

                this.students_by_departaments = response.data;

                this.students_by_departaments.forEach(element => {
                    console.log(element.professors);
                });
            });

        },
    }

}
</script>
<style scoped>
.estilotexto {
    font-size: 50px;



}

</style>
