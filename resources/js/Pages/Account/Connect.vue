<template>
    <Head title="Connect with Writers"/>
    <Headers/>
    <div class="sm:container mx-auto px-6 py-8 mt-8 bg-white">
        <div class="mb-4 ml-8">
    <h3 class="text-gray-500 text-base font-bold ">Connect with Writers from all over the World</h3>
    <div class="flex justify-between">
    <div class="mt-4 relative w-full sm:w-1/2">
               <ion-icon name="search" class="absolute right-4 md:right-4 xl:right-[36%] top-4 "></ion-icon>
  <input type="text" v-model="Search" @keyup.enter="getValue" placeholder="search by category and profession" class="w-full placeholder:text-slate-500  py-3 rounded-full  border border-gray-300">
           
           </div>
           <div class=" hidden sm:block">
             
          <label for="countries" class="block mb-2 text-sm font-medium text-gray-900 ">Filter by</label>
         <select id="countries" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 ">
                           <option selected>Select Filter</option>
                           <option value="US">Popularity</option>
                           <option value="CA">Post</option>
                          <option value="FR">Followers</option>
                          <option value="DE">Engagement</option>
</select>

                  </div>
           </div>
           </div>

           

    <ul role="list" class="divide-y divide-gray-100">
        <li class="flex justify-between gap-x-6 py-5" v-for="user in users.data" :key="user.id">
          <div class="flex gap-x-4">
            <img class="h-12 w-12 flex-none rounded-full bg-gray-50"  :src="`/${user.image}`" alt="">
            <div class="min-w-0 flex-auto">
                <div class="flex space-x-4">
          <p class="text-sm font-semibold leading-6 text-gray-700">{{ user.name }}</p>
               <button class="text-sm bg-blue-500 hover:bg-blue-700 px-2 rounded-full text-white"
                @click="Follow(user.id)">{{ user.status ? 'Following' : 'Follow' }}</button>
              </div>
              <p>
              <Link :href="route('profile-view', [user.Username])" class="mt-1 truncate text-xs leading-5  text-gray-500">@{{ user.Username }}</Link>
              </p>
              <small class="text-slate-500 font-medium text-xs">{{ user.followersCount }} Followers</small>
            </div>
          </div>
         
        </li>
      
      </ul>
      </div>
      

</template>

<script setup>

import {Head} from '@inertiajs/vue3'
import Headers from '@/Components/HomeHeader.vue'
import MobileNav from '@/Components/MobileNav.vue'
import Follow from '@/Utils/Follow.vue'
import { ref } from 'vue';
import { router } from '@inertiajs/vue3';
import {Link }from '@inertiajs/vue3';


const Search=ref('')


const props=defineProps({users:Object})

console.log(props.users)

 const getValue = () => {
         router.get(`/Home/Connect`, {search:Search.value});
   }



</script>
