<template>

        <div class="relative flex items-top justify-center min-h-screen bg-gray-100 dark:bg-gray-900 sm:items-center sm:pt-0" style="background-color: #e3f2fd;">

        <div v-if="canLogin" class="hidden fixed top-0 right-0 px-6 py-4 sm:block">
            <inertia-link v-if="$page.props.user" href="/dashboard" class="text-sm text-gray-700 underline">
                Dashboard
            </inertia-link>

            <template v-else>
                <inertia-link :href="route('login')" class="text-sm text-gray-700 underline">
                    Login
                </inertia-link>

            </template>


        </div>
            <div >
                <img src="https://cnbguatemala.org/images/8/89/Logo_MINEDUC.png">
            </div>

        </div>






</template>

<style scoped>

</style>

<script>

    export default {


        props: {
            canLogin: Boolean,
            canRegister: Boolean,
            images: Object,
        },

        data: function () {
            return {
                images: [
                    {
                        image: "https://cnbguatemala.org/images/8/89/Logo_MINEDUC.png"
                    }
                ],
            };
        },


    }
</script>
