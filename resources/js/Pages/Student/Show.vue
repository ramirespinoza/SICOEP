<template>
    <app-layout>
        <template #header>
            <h1 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ student.personal_code }}: {{ student.name }} {{ student.last_name }}
            </h1>
        </template>

        <container>
            <div class="mt-5 md:col-span-2 md:mt-0">
                <form @submit.prevent="submit" >
                    <div class="overflow-hidden shadow sm:rounded-md">
                        <div class="bg-white px-4 py-5 sm:p-6">
                            <div class="grid grid-cols-6 gap-6">
                                <!--
                                <div class="col-span-6 sm:col-span-3">
                                    <label for="first-name" class="block text-sm font-medium text-gray-700">First name</label>
                                    <input type="text" name="first-name" id="first-name" autocomplete="given-name" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm" />
                                </div>

                                <div class="col-span-6 sm:col-span-3">
                                    <label for="last-name" class="block text-sm font-medium text-gray-700">Last name</label>
                                    <input type="text" name="last-name" id="last-name" autocomplete="family-name" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm" />
                                </div>

                                <div class="col-span-6 sm:col-span-4">
                                    <label for="email-address" class="block text-sm font-medium text-gray-700">Email address</label>
                                    <input type="text" name="email-address" id="email-address" autocomplete="email" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm" />
                                </div>
                                -->

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
                                    <label for="personal_code" class="block text-sm font-medium text-gray-700">Grade_id</label>
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
                                <label for="personal_code" class="block text-sm font-medium text-gray-700">Section</label>
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
                                    <label for="personal_code" class="block text-sm font-medium text-gray-700">Fecha de cumpleaños</label>
                                    <input
                                        type="date"
                                        name="birth_date"
                                        id="birth_date"
                                        v-model="form.birth_date"
                                        autocomplete="street-address"
                                        disabled
                                        class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm bg-gray-100"
                                    />
                                </div>

                                <div class="col-span-6 sm:col-span-2">
                                    <label for="personal_code" class="block text-sm font-medium text-gray-700">Class Schedule Id</label>
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
                                    <label for="personal_code" class="block text-sm font-medium text-gray-700">Identificacion Document</label>
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
                                    <label for="personal_code" class="block text-sm font-medium text-gray-700">Identification Document Number</label>
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
                                    <label for="personal_code" class="block text-sm font-medium text-gray-700">Professor DPI</label>
                                    <input
                                        type="number"
                                        name="professor_dpi"
                                        id="professor_dpi"
                                        v-model="form.professor_dpi"
                                        autocomplete="street-address"
                                        disabled
                                        class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm bg-gray-100"
                                    />
                                </div>
                                <div class="col-span-6 sm:col-span-3">
                                    <label for="personal_code" class="block text-sm font-medium text-gray-700">Tutelary Name</label>
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
                                    <label for="personal_code" class="block text-sm font-medium text-gray-700">Tutelary DPI</label>
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
                            <inertia-link
                                :href="route('student.index')"
                                class="inline-flex justify-center rounded-md border border-transparent bg-gray-800 py-2 px-4 text-sm font-medium text-white shadow-sm hover:bg-gray-700 focus:outline-none focus:outline-none focus:border-gray-900 focus:shadow-outline-gray transition ease-in-out duration-150"
                            >
                                Cerrar
                            </inertia-link>
                        </div>

                    </div>
                </form>
            </div>

        </container>

    </app-layout>

</template>

<script>
import AppLayout from "@/Layouts/AppLayout";
import Container from "@/Pages/Container";
export default {
    components: {
        Container,
        AppLayout
    },

    props:['student',{
        errors: Object
    }],

    data(){
        return{
            form:{
                personal_code:      this.$props.student.personal_code,
                name:               this.$props.student.name,
                last_name:          this.$props.student.last_name,
                grade_id:           this.$props.student.grade_id,
                section:            this.$props.student.section,
                birth_date:         this.$props.student.birth_date,
                identification_document:        this.$props.student.identification_document,
                identification_document_number: this.$props.student.identification_document_number,
                class_schedule_id:  this.$props.student.class_schedule_id,
                professor_dpi:      this.$props.student.professor_dpi,
                tutelary_name:      this.$props.student.tutelary_name,
                tutelary_dpi:       this.$props.student.tutelary_dpi,


            }
        }
    }
}
</script>
