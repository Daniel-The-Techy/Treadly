<template>
    <Head title="Testing"/>

<Auth>
    <div id="app" class="border border-none bg-white">
        <ckeditor :editor="editor" v-model="editorData"></ckeditor>
    </div>

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
import ClassicEditor from '@ckeditor/ckeditor5-build-classic';

let editor=ClassicEditor
let editorData='Hello This is keditor'



</script>