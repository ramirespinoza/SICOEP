<template>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg sm:py-6 lg:py-12">
                <!-- component -->
                <div class="overflow-x-auto">
                    <div class="min-w-screen bg-white flex justify-center bg-white font-sans overflow-hidden">
                        <div class="w-full lg:w-5/6">
                            <slot></slot>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>
