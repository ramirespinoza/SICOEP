<template>
    <dashboard-container>

               <welcome/>
    </dashboard-container>
</template>

<script>
    import AppLayout from '@/Layouts/AppLayout'
    import Container from "@/Pages/Container";
    import axios from "axios";
    import Welcome from "@/Jetstream/Welcome";
    import dashboardContainer from "@/Pages/DashboardContainer";

    export default {
        props: {
            students_professors: Array,
            schools_professors: Array
        },

        components: {
            Welcome,
            dashboardContainer,
            AppLayout,
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
