<script setup>
import ApplicationLogo from '@/Components/ApplicationLogo.vue';
import { Link } from '@inertiajs/vue3';
</script>

<template>
    
    <div class="Container">
        <div
            class="flex flex-col items-center justify-center px-6 py-8 mx-auto md:h-screen lg:py-0"
        >
        <div class="min-w-[350px] w-full bg-white rounded-lg shadow  md:mt-0 sm:max-w-md xl:p-0">
            <slot />
            </div>
        </div>
        </div>


    
    
</template>
