<template>

    <Head title="Home Profile"/>

    <Header/>

    <div class="sm:container sm:mx-auto sm:px-6 sm:py-1 sm:mt-8 bg-white">
      <div v-for="items in Profile" :key="items.key">

<div class="card bg-white max-w-full mt-4 rounded-md shadow-sm h-auto">
    <img :src="`/${items.Cover_image}`" class="w-full h-[20vh]  object-cover md:h-[40vh]">

    <div class="flex flex-col md:flex-rows lg:space-x-3 px-3 lg:px-8">
        <img :src="`/${items.Photo}`" class="rounded-full w-[100px] h-[100px] -mt-12">

        <div class="mt-2">
            <div class="flex justify-between">
                <div>
            <h2 class="text-gray-700 text-[24px] font-bold mb-2">{{ items.Username }}</h2>
            <p class="text-slate-500 test-sm font-">{{ items.Profession }}</p>
            </div>

            
           
              
  

  
  

               <div v-if="Auth">
                <button class="bg-blue-400  hover:bg-blue-700 py-2 px-8 md:px-12 text-white text-base rounded-md"
                v-text="Status ? 'Unfollow' : 'Follow'" @click="Follow(items.id)"></button>
               </div>

               <div v-else>
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6 hidden">
  <path stroke-linecap="round" stroke-linejoin="round" d="M6.75 12a.75.75 0 11-1.5 0 .75.75 0 011.5 0zM12.75 12a.75.75 0 11-1.5 0 .75.75 0 011.5 0zM18.75 12a.75.75 0 11-1.5 0 .75.75 0 011.5 0z" />
</svg>
  <p class="text-center text-slate-500">Edit profile</p>
               </div>
            </div>

               <div class="flex space-x-3 sm:space-x-24 mt-2">
                <small class="text-gray-400 font-semibold"><span class="font-bold  m-2 text-gray-800">{{ PostCount }}</span> Post</small>
                <small class="text-gray-400 font-semibold"><span class="font-bold text-gray-800 m-2">{{ FollowersCount }}</span> Followers</small>
                <small class="text-gray-400  font-semibold"><span class="font-bold text-gray-800 m-2">{{ FollowingCount }}</span>Following</small>
                <small class="text-gray-400 font-semibold"><span class="font-bold text-gray-800 m-2">270</span>  Likes</small>
               </div>




            <p class="text-sm text-slate-600 max-w-prose font-light mt-3">
          {{ items.Bio }}
            </p>
        </div>
    </div>





    <div class="border-b mt-4 mb-6 border-gray-200">
    <ul class="flex  -mb-px text-xs sm:text-sm font-medium text-center space-x-0 sm:space-x-0 text-gray-500 ">
   

    <li class="mr-2 mb-2 "  v-for="(_, tab) in tabs"
       :key="tab"
       :class="['tab-button', { active: currentTab === tab }]"
       @click="currentTab = tab" >
            <a  class="inline-flex p-1  md:px-8 border-b-2 border-transparent rounded-t-lg hover:text-gray-600 hover:border-gray-300 ">
                <svg aria-hidden="true" class="w-5 h-5 mr-1 hidden sm:block  text-gray-400 group-hover:text-gray-500 " fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-6-3a2 2 0 11-4 0 2 2 0 014 0zm-2 4a5 5 0 00-4.546 2.916A5.986 5.986 0 0010 16a5.986 5.986 0 004.546-2.084A5 5 0 0010 11z" clip-rule="evenodd"></path></svg>
                {{ tab }}
            </a>
           
        </li>
	
    </ul>
   
  </div>
  <component :is="tabs[currentTab]" class="tab"></component>

   
</div>

</div>

</div>

  

    <MobileNav/>
</template>

<script setup>

import {Head} from '@inertiajs/vue3'
import Header from '@/Components/HomeHeader.vue'
import MobileNav from '@/Components/MobileNav.vue'
import { ref } from 'vue'
import Activity from './Activity.vue';
import Posts from './Posts.vue'
import Following from './Following.vue'
import About from './About.vue'
import { router } from '@inertiajs/vue3';


defineProps(
  {
    Profile:Object,
     Status:Boolean, 
     FollowersCount:Number,
     Auth:Boolean,
      FollowingCount:Number,
      PostCount:Number
    
    })

const currentTab = ref('Posts')



const tabs = {
  Posts,
  Activity,
  Following,
  About,
}

const Follow = (id) => {
  
   router.post('f/' + id);
}



</script>
<style scoped>
.tab-button {
 

  cursor: pointer;
 
  margin-bottom: -1px;
  margin-right: -1px;
  text-align: center;
}

.tab-button:hover {
  background: #e0e0e0;
}
.tab-button.active {
  background: #e0e0e0;
}
</style>
