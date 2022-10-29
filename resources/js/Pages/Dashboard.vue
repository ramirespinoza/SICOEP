<template>

    <dashboard-container>

        <welcome/>

    </dashboard-container>
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
    import DashboardContainer from "@/Pages/DashboardContainer";

    export default {
        components: {
            DashboardContainer,
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
    font-size: 50px;



}

</style>
