<script setup>
import ApplicationLogo from '@/Components/ApplicationLogo.vue';
import { Link } from '@inertiajs/vue3';
</script>

<template>
    <div class="min-h-screen flex flex-col items-center  pt-6 sm:pt-0 bg-gray-100">
        <div class="w-full flex justify-between items-center text-gray-300 bg-[#000] h-[70px]">
     
     <div class="ml-5">
         <h3 class="text-bold text-2xl ">LOGO</h3>
     </div>
 
 
     <ul class="hidden md:flex mr-5 flex-grow ml-16">
          <li><a href="#">Home</a></li>
          <li><a href="#">Service</a></li>
          <li><a href="#">skills</a></li>
          <li><a href="#">About</a></li>
          <li><a href="#">Contact</a></li>
     </ul>

     <ul class="hidden md:flex mr-5 space-x-4">
        <li class="bg-orange-700 py-1 cursor-pointer px-4 rounded-sm text-sm font-medium transition delay-75 hover:scale-125"><a href="#">SignUp</a></li>
        <li class="bg-emerald-600 py-1 cursor-pointer px-4 rounded-sm text-sm font-medium transition delay-75 hover:scale-125"><a href="#">SignIn</a></li>
   </ul>
 
 
     <div class="hidden">
         <button>menu</button>
     </div>
 
 
    </div>
 
 
        <div
            class="w-full sm:max-w-md  mt-48 px-6 py-4   bg-white shadow-md overflow-hidden sm:rounded-lg"
        >
            <slot />
        </div>
    </div>
</template>
