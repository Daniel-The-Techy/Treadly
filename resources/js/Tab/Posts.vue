<template>
  
  <div class="max-w-2xl  p-4 space-y-4">
  <!-- Loop through posts -->
  <div class="bg-white rounded-2xl shadow-sm hover:shadow-md transition p-4" 
     v-for="item in Post.posts" :key="item.id">
    <!-- Header -->
     
    <div class="flex items-center gap-3" >
      <img  :src="`/${userProfile.profile?.Photo}`" alt="avatar" class="w-10 h-10 rounded-full">
      <div>
       
        <div class="inline-flex items-center justify-between gap-2"> 
          <p class="font-semibold text-gray-800">{{ userProfile.name}}</p>
      <p class="text-xs text-gray-400">@{{ userProfile.profile?.Username }}</p>
    </div>
        <p class="text-xs text-gray-500">2h ago</p>
      </div>
    
    </div>

    <!-- Post content -->
    <div class="mt-3">
      <Link :href="route('Post.show',  [item.id, item.slug])" class="text-lg font-bold text-gray-900">{{ item.title}}</Link>
      <p class="text-gray-600 text-sm mt-1 line-clamp-2" v-html="item.content">
        
      </p>
    </div>

    <!-- Footer meta -->
    <div class="flex items-center gap-6 text-sm text-gray-500 mt-3">
      <span class="flex items-center gap-1">
        <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
        </svg>
        {{ item.views_count }}
      </span>
      <span class="flex items-center gap-1">
        <svg xmlns="http://www.w3.org/2000/svg"
        :class= "item.liked_by_auth_user ? 'fill-pink-500 w-5 h-5 group-hover:fill-pink-500 group-hover:stroke-pink-500  transition-all ' : 'w-5 h-5 group-hover:fill-pink-500 group-hover:stroke-pink-500  transition-all' "
          fill="none" viewBox="0 0 24 24" stroke="currentColor">
          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z" />
        </svg>
        {{ item.likes_count }}
      </span>
      <span class="flex items-center gap-1">
        <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 10h.01M12 10h.01M16 10h.01M21 12c0 1.657-4.03 3-9 3s-9-1.343-9-3 4.03-3 9-3 9 1.343 9 3z" />
        </svg>
        {{ item.comment_count }}
      </span>
    </div>
  </div>
</div>
</template>

<script setup>
import { Link } from "@inertiajs/vue3";

 const props=defineProps({Post:Object, postLikeCount:Number, postViewCount:Number, userProfile:Object})

console.log(props.userProfile)

</script>