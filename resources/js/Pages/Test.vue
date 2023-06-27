<template>
    <Head title="Testing"/>

<Auth>
   

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">You're logged in as a member of this great Application Testing Mode!</div>
            </div>
        </div>
    </div>
    </Auth>
</template>

<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import Auth from '@/Layouts/Auth.vue'
import { Head } from '@inertiajs/vue3';



</script>