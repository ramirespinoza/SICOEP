<template>
    <app-layout>
        <template #header>
            <div style="width: 200px">
            <center><h1 class="estilotexto">
                Reportes
            </h1></center>
            <nav class="bg-white border-b border-gray-100">
                <!-- Navigation Links -->
                <div class="hidden" style="display: flex; flex-direction: column">
                    <jet-nav-link :href="route('dashboard')" :active="route().current('dashboard')">
                        Bienvenido
                    </jet-nav-link>
                    <jet-nav-link :href="route('students_by_school_report')" :active="route().current('students_by_school_report')">
                        Reporte de estudiantes inscritos por escuela.
                    </jet-nav-link>
                    <jet-nav-link :href="route('students_by_professor_report')" :active="route().current('students_by_professor_report')">
                        Reporte de estudiantes inscritos por catedrático
                    </jet-nav-link>

                    <jet-nav-link :href="route('students_by_professor_department')" :active="route().current('students_by_professor_department')">
                        Reporte de estudiantes por departamento y municipio
                    </jet-nav-link>

                </div>


                <!-- Responsive Navigation Menu -->
                <div :class="{'block': showingNavigationDropdown, 'hidden': ! showingNavigationDropdown}" class="sm:hidden">
                    <div class="pt-2 pb-3 space-y-1">
                        <jet-responsive-nav-link :href="route('dashboard')" :active="route().current('dashboard')">
                            Dashboard
                        </jet-responsive-nav-link>
                    </div>

                    <!-- Responsive Settings Options -->
                    <div class="pt-4 pb-1 border-t border-gray-200">
                        <div class="flex items-center px-4">
                            <div v-if="$page.props.jetstream.managesProfilePhotos" class="flex-shrink-0 mr-3" >
                                <img class="h-10 w-10 rounded-full object-cover" :src="$page.props.user.profile_photo_url" :alt="$page.props.user.name" />
                            </div>

                            <div>
                                <div class="font-medium text-base text-gray-800">{{ $page.props.user.name }}</div>
                                <div class="font-medium text-sm text-gray-500">{{ $page.props.user.email }}</div>
                            </div>
                        </div>

                        <div class="mt-3 space-y-1">
                            <jet-responsive-nav-link :href="route('profile.show')" :active="route().current('profile.show')">
                                Profile
                            </jet-responsive-nav-link>

                            <jet-responsive-nav-link :href="route('api-tokens.index')" :active="route().current('api-tokens.index')" v-if="$page.props.jetstream.hasApiFeatures">
                                API Tokens
                            </jet-responsive-nav-link>

                            <!-- Authentication -->
                            <form method="POST" @submit.prevent="logout">
                                <jet-responsive-nav-link as="button">
                                    Logout
                                </jet-responsive-nav-link>
                            </form>


                        </div>
                    </div>
                </div>
            </nav>
            </div>
        </template>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg p-10">
                    <slot ></slot>
                </div>
            </div>
        </div>
    </app-layout>
</template>

<script>
import AppLayout from '@/Layouts/AppLayout'
import Welcome from '@/Jetstream/Welcome'
import JetApplicationMark from '@/Jetstream/ApplicationMark'
import JetBanner from '@/Jetstream/Banner'
import JetDropdown from '@/Jetstream/Dropdown'
import JetDropdownLink from '@/Jetstream/DropdownLink'
import JetNavLink from '@/Jetstream/NavLink'
import JetResponsiveNavLink from '@/Jetstream/ResponsiveNavLink'

export default {
    components: {
        AppLayout,
        Welcome,
        JetApplicationMark,
        JetBanner,
        JetDropdown,
        JetDropdownLink,
        JetNavLink,
        JetResponsiveNavLink,
    },
}
</script>
<style scoped>
.estilotexto {
    font-size: 25px;



}

</style>
