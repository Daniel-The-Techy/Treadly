<template>
    <Head title="Analytics"/>

    <Auth>
    <main class="max-w-7xl mx-auto px-4 py-6 space-y-6">

<!-- Stats Cards -->
<section class="grid grid-cols-1 md:grid-cols-4 gap-6">
  <div class="bg-white p-6 rounded-xl shadow">
    <h2 class="text-sm text-gray-500">Total Posts</h2>
    <p class="text-2xl font-bold">{{ AnalyticsData.posts_count }}</p>
  </div>
  <div class="bg-white p-6 rounded-xl shadow">
    <h2 class="text-sm text-gray-500">Total Views</h2>
    <p class="text-2xl font-bold">{{ AnalyticsData.post_views_count}}</p>
  </div>
  <div class="bg-white p-6 rounded-xl shadow">
    <h2 class="text-sm text-gray-500">Total Likes</h2>
    <p class="text-2xl font-bold">{{ AnalyticsData.like_post_count }}</p>
  </div>
  <div class="bg-white p-6 rounded-xl shadow">
    <h2 class="text-sm text-gray-500">Followers</h2>
    <p class="text-2xl font-bold">{{ AnalyticsData.followers_count }}</p>
  </div>
</section>

<!-- Chart Placeholder 
<section class="bg-white rounded-xl shadow p-6">
  <h2 class="text-lg font-semibold mb-4">Engagement (Last 7 Days)</h2>
  <div class="h-64 flex items-center justify-center text-gray-400 border border-dashed rounded-lg">
    📊 Chart goes here
  </div>
</section>
--->

<!-- Top Posts -->
<section class="bg-white rounded-xl shadow p-6">
  <h2 class="text-lg font-semibold mb-4">Top Performing Posts</h2>
  <table class="w-full text-left text-sm" >
    <thead>
      <tr class="border-b">
        <th class="pb-2">Post</th>
        <th class="pb-2">Views</th>
        <th class="pb-2">Likes</th>
        <th class="pb-2">Comments</th>
      </tr>
    </thead>
    <tbody v-for="post in topPosts" :key="post.id" >
      <tr class="border-b">
        <td class="py-2">🚀 {{ post.postTitle }}</td>
        <td>{{ post.post_view_count }}</td>
        <td>{{ post.post_likes_count }}</td>
        <td>{{ post.post_comment_count }}</td>
      </tr>
     
    </tbody>
  </table>
</section>

<!-- Recent Activity -->
<section class="bg-white rounded-xl shadow p-6">
  <h2 class="text-lg font-semibold mb-4">Recent Activity</h2>
  <ul class="space-y-3 text-sm" v-for="activity in activities" :key="activity.id">
       <div class="mt-4" v-html="message(activity)"></div>
  </ul>
</section>


</main>

</Auth>
 
</template>

<script setup>

import Auth from '@/Layouts/Auth.vue'
import { Head } from '@inertiajs/vue3';
import MiniAnalytics from '@/Components/MiniAnalytics.vue';


  const props=defineProps({AnalyticsData:Object, topPosts:Object, activities:Object});

      function message(activity){
           switch(activity.type) {
              case 'post_liked' :
                return `<li><span class="font-semibold">${activity.actor_name}</span> liked your post  <span class="font-semibold underline text-gray-700">“${activity.subject_post_title}”</span>
                  <span class="text-gray-500">${activity.time}</span></li>`
                case 'comment_liked' : 
                 return `<li><span class="font-semibold">${activity.actor_name}</span> liked your comment   <span class="text-gray-700 underline font-semibold">“${activity.subject_post_title}”</span>
                  <span class="text-gray-500">${activity.time}</span></li>`
                 case 'commented' :
                  return  `<li><span class="font-semibold">${activity.actor_name}</span> commented on your post <span class="font-semibold underline">“${activity.subject_post_title}”</span> <span class="text-gray-500">${activity.time}</span></li>`
                   case 'followed' :
                     return `<li><span class="font-semibold">${activity.actor_name}</span> followed you <span class="text-gray-500">${activity.time} </span></li>`
                
                    return 
           }
      }

</script>