<template xmlns="http://www.w3.org/1999/html">
    <dashboard-container>

    <template #header>
            <h1 class="font-semibold text-xl text-gray-800 leading-tight">
                Inscripción de estudiantes
            </h1>
        </template>

        <!-- List -->

            <input type="text" placeholder="Buscar escuela..." v-model="qschool" class="mt-1 rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm">
            <input type="text" placeholder="Buscar grados..." v-model="qgrade" class="mt-1 rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm">
            <span class="font-medium"> Fecha inicio </span>
            <input type="date" placeholder="Buscar escuela..." v-model="qdateStart" class="mt-1 rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm">
            <span class="font-medium"> Fecha final </span>
            <input type="date" placeholder="Buscar escuela..." v-model="qdateEnd" class="mt-1 rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm">
            <div class="bg-white shadow-md rounded my-6">
                <table v-if="students_by_school_report.length!==0" class="min-w-max w-full table-auto">
                    <thead>
                    <tr class="bg-gray-200 text-gray-600 uppercase text-sm leading-normal">
                        <th class="py-3 px-6 text-left">ID Escuela</th>
                        <th class="py-3 px-6 text-left">Nombre</th>
                        <th class="py-3 px-6 text-center">
                            Reportes
                    <tr class="bg-gray-200 text-gray-600 uppercase text-sm leading-normal">
                        <th class="py-3 px-6 text-center">Grado</th>
                        <th class="py-3 px-6 text-center">Total estudiantes inscritos</th>
                    </tr>
                    </th>
                    </tr>
                    </thead>
                    <tbody class="text-gray-600 text-sm font-light">
                    <tr v-for="school in students_by_school_report" :key="school.id" class="border-b border-gray-200 hover:bg-gray-100">

                        <td class="py-3 px-6 text-left whitespace-nowrap">
                            <span class="font-medium">{{ school.id }}</span>
                        </td>

                        <td class="py-3 px-6 text-left">
                            <span class="font-medium">{{ school.name }}</span>
                        </td>

                        <td class="py-3 px-6 text-center">

                            <table v-if="students_by_school_report.length!==0" class="min-w-max w-full table-auto">

                                <tbody class="text-gray-600 text-sm font-light">
                                <tr v-for="grade in school.grades" :key="grade.id" class="border-b border-gray-200 hover:bg-gray-100">
                                    <td class="py-3 px-6 text-left whitespace-nowrap">
                                        <span class="font-medium">{{ grade.name }}</span>
                                    </td>
                                    <td class="py-3 px-6 text-left">
                                        <span class="font-medium">{{ grade.count_student_enrollments }}</span>
                                    </td>
                                    <td class="py-3 px-6 text-center">


                                    </td>
                                </tr>
                                </tbody>
                            </table>


                        </td>
                    </tr>
                    </tbody>
                </table>
                <h1 v-if="students_by_school_report.length===0"  class="font-semibold text-xl text-gray-800 leading-tight px-36">
                    **Sin resultados**
                </h1>
            </div>
        </dashboard-container>


</template>

<script>
import AppLayout from '@/Layouts/AppLayout'
import Container from "@/Pages/Container";
import axios from "axios";
import DialogModal from "@/Pages/Modal";
import vSelect from 'vue-select';
import 'vue-select/dist/vue-select.css';
import dashboard from "@/Pages/Dashboard";
import moment from 'moment';
import Fuse from 'fuse.js';
import DashboardContainer from "@/Pages/DashboardContainer";

export default {
    props: {
        students_by_school_report: Array,
        dateStart: "",
        dateEnd: "",
    },

    components: {
        DashboardContainer,
        DialogModal,
        AppLayout,
        Container,
        vSelect,
    },

    created() {

        this.qdateStart = this.dateStart;
        this.qdateEnd = this.dateEnd;
    },

    data() {
        return {
            modals: {
                showModal: false,
                errorModal: false,
                title: null,
            },
            errors: "",
            q:"",
            qschool: "",
            qgrade: "",
            qdateStart: "",
            qdateEnd: "",

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

        showErrorModal: function () {
            this.modals.title = "Error";
            this.modals.errorModal = true;

        },

    },


    watch: {
        qschool: function () {
            this.$inertia.replace(this.route('students_by_school_report',
                {school: this.qschool, grade: this.qgrade, dateStart: this.qdateStart, dateEnd: this.qdateEnd}))
        },
        qgrade: function () {
            this.$inertia.replace(this.route('students_by_school_report',
                {school: this.qschool, grade: this.qgrade, dateStart: this.qdateStart, dateEnd: this.qdateEnd}))
        },
        qdateStart: function () {
            this.$inertia.replace(this.route('students_by_school_report',
                {school: this.qschool, grade: this.qgrade, dateStart: this.qdateStart, dateEnd: this.qdateEnd}))
        },
        qdateEnd: function () {
            this.$inertia.replace(this.route('students_by_school_report',
                {school: this.qschool, grade: this.qgrade, dateStart: this.qdateStart, dateEnd: this.qdateEnd}))
        }
    }
}
</script>
