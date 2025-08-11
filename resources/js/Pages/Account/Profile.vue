<template>

    <Head title="Home Profile"/>

    <Header/>


    <div class="sm:container sm:mx-auto sm:px-6 sm:py-1 sm:mt-8 bg-white">
      <div >

<div class="card bg-white max-w-full mt-4 rounded-md shadow-sm h-auto">
       
    <img :src="`/${userProfile.profile?.Cover_image}`" class="w-full h-[20vh]  object-cover md:h-[40vh]">

    

    <div class="flex flex-col md:flex-rows lg:space-x-3 px-3 lg:px-8">
        <img :src="`/${userProfile.profile?.Photo}`" class="rounded-full w-[100px] h-[100px] -mt-12">

        <div class="mt-2">
            <div class="flex justify-between">
                <div>
            <h2 class="text-gray-700 text-[24px] font-bold mb-2">{{ userProfile.name }}</h2>
            <p class="text-slate-400 test-xs font-">@{{ userProfile.profile?.Username }}</p>
            </div>

            
           
              
  
  
  <div v-if="Auth">
            <p><Link :href="route('profile')" class="text-gray-600 font-semibold">Edit Profile</Link></p>
            
               </div>
  

               <div v-else>
                <button :class="followingStatus ? 
      'bg-gray-200 border border-gray-100  hover:bg-gray-300 py-2 px-4 md:px-12 text-gray-800 font-semibold text-base rounded-full md:rounded-full': 'bg-blue-600    hover:bg-blue-700  py-2 px-4 md:px-12 text-white font-semibold text-base rounded-full md:rounded-full'"
                
               
                v-text="followingStatus ? 'Unfollow' : 'Follow'" @click="Follow(userProfile.profile.user_id)"></button>
               </div> 

               
            </div>

            



             <div> 
            <p class="text-sm text-gray-600 max-w-prose  mt-3">
          {{ userProfile.profile?.Bio }}
            </p>
            </div>


            <div class="flex space-x-3 sm:space-x-24 mt-2">
                <small class="text-gray-400 font-semibold"><span class="font-bold  m-2 text-gray-800">{{ PostCount }}</span> Post</small>
                <small class="text-gray-400 font-semibold"><span class="font-bold text-gray-800 m-2">{{ FollowersCount }}</span> Followers</small>
                <small class="text-gray-400  font-semibold"><span class="font-bold text-gray-800 m-2">{{ FollowingCount }}</span>Following</small>
                <small class="text-gray-400 font-semibold"><span class="font-bold text-gray-800 m-2">270</span>  Likes</small>
               </div>


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
  <component :is="tabs[currentTab]" class="tab"
   :userProfile="userProfile"
    :UserFollowers="Followings"
    :status="status"
    :id="user_id"
    :Post="Post"
    :Auth="Auth"
    @Follow="Follow"
    >
  
  
  </component>

   
</div>

</div>

</div>

  

    <MobileNav/>
</template>

<script setup>

import {Head, useForm} from '@inertiajs/vue3'
import Header from '@/Components/HomeHeader.vue'
import MobileNav from '@/Components/MobileNav.vue'
import { ref } from 'vue'
import Posts from '@/Tab/Posts.vue';
import Following from '../../Tab/Following.vue'
import About from '../../Tab/About.vue'
import { router } from '@inertiajs/vue3';
import Follow from '@/Utils/Follow.vue';
import {Link} from '@inertiajs/vue3';
//import PostTab from '../../Tab/Posts.vue';


const props = defineProps(
  {
    userProfile:Object,
    status:Object, 
    FollowersCount:Number,
    Auth:Boolean,
    FollowingCount:Number,
    PostCount:Number,
    Followings:Object,
    user_id:Number,
    Post:Object,
    postLikeCount:Number,
    postViewCount:Number, 
    followingStatus:Boolean
    
    })

const currentTab = ref('Posts')

console.log(props.userProfile)

const tabs = {
  Posts,
  Following,
  About,
}

 
 //const save=Form.Post(route('Follows'))

 
//const Follow = (id) => {
  // router.post('/Home/Profile/f/' + id, {preserveScroll:true} );
//}



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
