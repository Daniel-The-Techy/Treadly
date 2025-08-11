<template>

<Headers />
    <Head title="Post" />

    <div class="bg-gray-50">
        <div class="lg:container mx-auto  lg:px-24 py-8">
            <div class="px-6">
                <h2 class="text-2xl font-medium text-gray-800">
                    Community Blog
                </h2>
                <small class="text-gray-500 text-sm font-semibold"
                    >Meet new people,post content, gain more
                    followers....</small
                >

                <div class="mt-4 relative w-[80%]">
                    <ion-icon
                        name="search"
                        class="absolute right-4 md:right-4 xl:right-[36%] top-4"
                    ></ion-icon>
                    <input
                        type="text"
                        placeholder="search by category, author, and title"
                        v-model="Search"
                        @keyup.enter="getValue"
                        class="w-full xl:w-full py-3 rounded-sm px-5 border border-gray-300"
                    />
                </div>
            </div>

            <div class="border-t border-gray-200 w-[80%] mt-12">
                <div class="mt-8 w-[200px] ml-6 md:ml-0">
                    <label
                        for="countries"
                        class="block mb-2 text-sm font-medium text-gray-900"
                    ></label>
                    <select
                        id="countries" @change="handleFilterChange" v-model="selectedFilter"
                        class="bg-gray-50 border py-3 border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                    >
                        <option value="default" default>default</option>
                        <option value="popular">By Popularity</option>
                        <option value="engagement">By Engagement</option>
                        <option value="latest">By Latest</option>
                        <option value="most_viewed">By most viewed</option>
                    </select>
                </div>
            </div>

            <div class="xl:flex flex-cols  space-x-4 lg:space-x-16"  >
                <div
                    class="mt-10 grid max-w-2xl px-4  grid-cols-1  gap-x-8 gap-y-8 mx-auto lg:max-w-none lg:grid-rows-3" 
                >
                    <div
                        class="flex flex-col md:flex-row gap-x-4 bg-white  gap-3 shadow-sm  px-8 py-8" v-for="post in posts.data" :key="post.id"
                    >
                        <img
                            :src="`/${post.Cover_image}`"
                            class="rounded-md w-full md:w-[220px] lg:w-[300px] h-auto"
                        />
                        <article
                            class="flex max-w-xl flex-col justify-between mt-3"
                        >
                            <div class="flex items-center gap-x-4 text-xs">
                                <time
                                    datetime="2020-03-16"
                                    class="text-gray-500"
                                    >{{ formatDate(post.created_at) }}</time
                                >
                                <a
                                    href="#"
                                    class="relative z-10 rounded-full bg-gray-50 px-3 py-1.5 font-medium text-gray-600 hover:bg-gray-100"
                                    >{{ post.category.name }}</a
                                >
                              <!-----  <div class="ml-auto">
                                    <p class="text-slate-600">2 min ago</p>
                                </div> ---->
                            </div>
                            <div class="group relative">
                                <h3
                                    class="mt-3 text-lg font-semibold leading-6 text-gray-900 group-hover:text-gray-600"
                                >
                                    <Link :href="route('Post.show',  [post.id, post.slug])">
                                        <span class="absolute inset-0"></span>
                                        {{ post.title }}
                                    </Link>
                                </h3>
                                <div
                                    class="mt-5 line-clamp-3 leading-6 text-slate-500" v-html="post.content"
                                >
                                
                            </div>

                                <span
                                    class="text-sm font-medium text-blue-800 mt-4 inline-flex  items-center justify-between"
                                >
                                    Read more
                                    <svg
                                        xmlns="http://www.w3.org/2000/svg"
                                        fill="none"
                                        viewBox="0 0 24 24"
                                        stroke-width="1.5"
                                        stroke="currentColor"
                                        class="w-4 h-4 ml-1 text-gray-600"
                                    >
                                        <path
                                            stroke-linecap="round"
                                            stroke-linejoin="round"
                                            d="M4.5 12h15m0 0l-6.75-6.75M19.5 12l-6.75 6.75"
                                        />
                                    </svg>
                                </span>
                            </div>
                    <div class="flex items-center justify-between">
                            <div
                                class="relative mt-8 flex items-center gap-x-4"
                            >
                                <img
                                   :src="`/${post.user.profile?.Photo}`"
                                    alt=""
                                    class="h-10 w-10 rounded-full bg-gray-50"
                                />
                                <div class="text-sm leading-6">
                                    <p class="font-semibold text-gray-900">
                                        <a href="#">
                                            <span
                                                class="absolute inset-0"
                                            ></span>
                                            {{ post.user.name}}
                                        </a>
                                    </p>
                                  <p class="text-gray-400 text-xs">@{{ post.user.profile?.Username }}</p>
                                </div>
                            </div>
                            <div class="flex items-center justify-between gap-1 mt-4">
                         
                                <svg
                                        xmlns="http://www.w3.org/2000/svg"
                                        fill="none"
                                        viewBox="0 0 24 24"
                                        stroke-width="1.5"
                                        stroke="currentColor"
                                        class="w-4 h-4 ml-1 text-gray-600"
                                    >
                                        <path
                                            stroke-linecap="round"
                                            stroke-linejoin="round"
                                            d="M12 6v6h4.5m4.5  0a9 9 0 11-18 0 9 9 0 0118 0z"
                                        />
                                    </svg>
                            
                    
                            <p class="text-indigo-700 text-sm font-medium ">{{ post.reading_time }} min read</p>

                            </div>
                            </div>
                        </article>
                    </div>

                    <!---Pagination-->
                    <div class="flex space-x-2">
                        <Link v-for="link in posts.links" :key="link.label" 
                        :href="link.url" class="px-3 py-4 border rounded" :v-html="link.label" :class="{'bg-blue-300 text-white': link.active, 'text-gray-500': !link.url}"/>
                    </div>
                    </div>

                    <!-- More posts... -->

                  

                <div class="max-w-6xl xl:block  mt-16 ">
                    <div
                        class="xl:w-[150%] px-4 bg-white rounded-lg shadow-md sm:p-8"
                    >
                        <div class="flex items-center  justify-between mb-4">
                            <h5
                                class="text-xl font-bold leading-none text-gray-900"
                            >
                                Top Category
                            </h5>
                            <a
                                href="#"
                                class="text-sm font-medium text-blue-600 hover:underline dark:text-blue-500"
                            >
                                View all
                            </a>
                        </div>
                        <div class="flow-root">
                            <ul role="list" class="divide-y divide-gray-200"   >
                                <li class="py-3 sm:py-4" v-for="top in topCategory" :key="top.id" >
                                    <div class="flex items-center space-x-4">
                                        <div class="flex-1 min-w-0" >
                                            <p
                                                class="text-sm font-medium text-gray-900 truncate"
                                            >
                                                {{ top.name}}
                                            </p>
                                        </div>
                                        <div
                                            class="inline-flex items-center text-base font-semibold text-gray-900"
                                        >
                                            {{ top.posts_count }}
                                        </div>
                                    </div>
                                </li>
                               
                            </ul>
                        </div>
                    </div>

                    <div class="max-w-6xl xl:block mt-8">
                        <div
                            class="xl:w-[150%] px-4  bg-white rounded-lg shadow-md sm:p-8"
                        >
                            <div class="flex items-center justify-between mb-4">
                                <h5
                                    class="text-xl font-bold leading-none text-gray-900"
                                >
                                    Top Contributor
                                </h5>
                                <a
                                    href="#"
                                    class="text-sm font-medium text-blue-600 hover:underline dark:text-blue-500"
                                >
                                    View all
                                </a>
                            </div>
                            <div class="flow-root">
                                <ul
                                    role="list"
                                    class="divide-y divide-gray-200"
                                >
                                    <li class="py-3 sm:py-4" v-for="topPoster in topContributor" :key="topPoster.id">
                                        <div
                                            class="flex items-center space-x-4"
                                        >

                                        
                                    
                                            <div class="flex-shrink-0">
                                                
                                                <img
                                                    class="w-8 h-8 rounded-full"
                                                     :src="`/${topPoster.profile?.image}`"
                                                    alt="Neil image"
                                                />
                                            </div>
                                            <div class="flex-1 min-w-0">
                                                <p
                                                    class="text-sm font-medium text-gray-900 truncate"
                                                >
                                                    {{ topPoster.name }}
                                                </p>
                                            </div>
                                            <div
                                                class="inline-flex items-center text-base font-semibold text-gray-900"
                                            >
                                                {{ (topPoster.posts_count) }}
                                            </div>
                                        </div>
                                    </li>

                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div></div>
        </div>
    </div>

  
</template>

<script setup>
import { formatDate } from '@/Utils/FormatDate.vue';
import { Link } from '@inertiajs/vue3';
import Headers from "@/Components/HomeHeader.vue";
import { Head } from '@inertiajs/vue3'
import { router } from '@inertiajs/vue3';
import { ref } from 'vue';


const props=defineProps({posts:Object, topCategory:Object, topContributor:Array})
const selectedFilter=ref('default')
const Search=ref('')


   const getValue = () => {
         router.get(`/Home/Post/search`, {search:Search.value});
   }


 function handleFilterChange (event){
    
     router.get(`/Home/Post`, {filter: event.target.value},  {preserveState:true, preserveScroll:true})

    
 }


</script>