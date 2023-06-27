<template>
    <Head title="Connect with Writers"/>
    <Headers/>
    <div class="sm:container mx-auto px-6 py-8 mt-8 bg-white">
        <div class="mb-4 ml-8">
    <h3 class="text-gray-500 text-base font-bold">Connect with Writers from all over the World</h3>
    <div class="flex justify-between">
    <div class="mt-4 relative w-full sm:w-1/2">
               <ion-icon name="search" class="absolute right-4 md:right-4 xl:right-[36%] top-4 "></ion-icon>
  <input type="text" placeholder="search by category and profession" class="w-full placeholder:text-slate-500  py-3 rounded-full  border border-gray-300">
           
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
        <li class="flex justify-between gap-x-6 py-5">
          <div class="flex gap-x-4">
            <img class="h-12 w-12 flex-none rounded-full bg-gray-50" src="https://images.unsplash.com/photo-1494790108377-be9c29b29330?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=2&w=256&h=256&q=80" alt="">
            <div class="min-w-0 flex-auto">
                <div class="flex space-x-4">
              <p class="text-sm font-semibold leading-6 text-gray-700">Leslie Alexander</p>
               <button class="text-sm bg-blue-500 hover:bg-blue-700 px-2 rounded-full text-white">Follow</button>
              </div>
              <p class="mt-1 truncate text-xs leading-5 text-gray-500">leslie.alexander@example.com</p>
              <small class="text-slate-500 font-medium text-xs">450 Followers</small>
            </div>
          </div>
          <div class="hidden sm:flex sm:flex-col sm:items-end">
            <p class="text-sm leading-6 text-gray-900">Co-Founder / CEO</p>
            <p class="mt-1 text-xs leading-5 text-gray-500">Last seen <time datetime="2023-01-23T13:23Z">3h ago</time></p>
          </div>
        </li>
        <li class="flex justify-between gap-x-6 py-5">
          <div class="flex gap-x-4">
            <img class="h-12 w-12 flex-none rounded-full bg-gray-50" src="https://images.unsplash.com/photo-1494790108377-be9c29b29330?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=2&w=256&h=256&q=80" alt="">
            <div class="min-w-0 flex-auto">
                <div class="flex space-x-4">
              <p class="text-sm font-semibold leading-6 text-gray-700">Leslie Alexander</p>
               <button class="text-sm bg-blue-500 hover:bg-blue-700 px-2 rounded-full text-white">Follow</button>
              </div>
              <p class="mt-1 truncate text-xs leading-5 text-gray-500">leslie.alexander@example.com</p>
              <small class="text-slate-500 font-medium text-xs">450 Followers</small>
            </div>
          </div>
          <div class="hidden sm:flex sm:flex-col sm:items-end">
            <p class="text-sm leading-6 text-gray-900">Co-Founder / CEO</p>
            <p class="mt-1 text-xs leading-5 text-gray-500">Last seen <time datetime="2023-01-23T13:23Z">3h ago</time></p>
          </div>
        </li>
        <li class="flex justify-between gap-x-6 py-5">
          <div class="flex gap-x-4">
            <img class="h-12 w-12 flex-none rounded-full bg-gray-50" src="https://images.unsplash.com/photo-1506794778202-cad84cf45f1d?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=2&w=256&h=256&q=80" alt="">
            <div class="min-w-0 flex-auto">
              <p class="text-sm font-semibold leading-6 text-gray-900">Dries Vincent</p>
              <p class="mt-1 truncate text-xs leading-5 text-gray-500">dries.vincent@example.com</p>
              <button class="bg-blue-500 py-2 px-8 rounded-md cursor-pointer text-base text-white">Follow</button>
            </div>
          </div>
          <div class="hidden sm:flex sm:flex-col sm:items-end">
            <p class="text-sm leading-6 text-gray-900">Business Relations</p>
            <div class="mt-1 flex items-center gap-x-1.5">
              <div class="flex-none rounded-full bg-emerald-500/20 p-1">
                <div class="h-1.5 w-1.5 rounded-full bg-emerald-500"></div>
              </div>
              <p class="text-xs leading-5 text-gray-500">Online</p>
            </div>
          </div>
        </li>
        <li class="flex justify-between gap-x-6 py-5">
          <div class="flex gap-x-4">
            <img class="h-12 w-12 flex-none rounded-full bg-gray-50" src="https://images.unsplash.com/photo-1494790108377-be9c29b29330?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=2&w=256&h=256&q=80" alt="">
            <div class="min-w-0 flex-auto">
                <div class="flex space-x-4">
              <p class="text-sm font-semibold leading-6 text-gray-700">Leslie Alexander</p>
               <button class="text-sm bg-blue-500 hover:bg-blue-700 px-2 rounded-full text-white">Follow</button>
              </div>
              <p class="mt-1 truncate text-xs leading-5 text-gray-500">leslie.alexander@example.com</p>
              <small class="text-slate-500 font-medium text-xs">450 Followers</small>
            </div>
          </div>
          <div class="hidden sm:flex sm:flex-col sm:items-end">
            <p class="text-sm leading-6 text-gray-900">Co-Founder / CEO</p>
            <p class="mt-1 text-xs leading-5 text-gray-500">Last seen <time datetime="2023-01-23T13:23Z">3h ago</time></p>
          </div>
        </li>
        <li class="flex justify-between gap-x-6 py-5">
          <div class="flex gap-x-4">
            <img class="h-12 w-12 flex-none rounded-full bg-gray-50" src="https://images.unsplash.com/photo-1494790108377-be9c29b29330?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=2&w=256&h=256&q=80" alt="">
            <div class="min-w-0 flex-auto">
                <div class="flex space-x-4">
              <p class="text-sm font-semibold leading-6 text-gray-700">Leslie Alexander</p>
               <button class="text-sm bg-blue-500 hover:bg-blue-700 px-2 rounded-full text-white">Follow</button>
              </div>
              <p class="mt-1 truncate text-xs leading-5 text-gray-500">leslie.alexander@example.com</p>
              <small class="text-slate-500 font-medium text-xs">450 Followers</small>
            </div>
          </div>
          <div class="hidden sm:flex sm:flex-col sm:items-end">
            <p class="text-sm leading-6 text-gray-900">Co-Founder / CEO</p>
            <p class="mt-1 text-xs leading-5 text-gray-500">Last seen <time datetime="2023-01-23T13:23Z">3h ago</time></p>
          </div>
        </li>
        <li class="flex justify-between gap-x-6 py-5">
          <div class="flex gap-x-4">
            <img class="h-12 w-12 flex-none rounded-full bg-gray-50" src="https://images.unsplash.com/photo-1494790108377-be9c29b29330?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=2&w=256&h=256&q=80" alt="">
            <div class="min-w-0 flex-auto">
                <div class="flex space-x-4">
              <p class="text-sm font-semibold leading-6 text-gray-700">Leslie Alexander</p>
               <button class="text-sm bg-blue-500 hover:bg-blue-700 px-2 rounded-full text-white">Follow</button>
              </div>
              <p class="mt-1 truncate text-xs leading-5 text-gray-500">leslie.alexander@example.com</p>
              <small class="text-slate-500 font-medium text-xs">450 Followers</small>
            </div>
          </div>
          <div class="hidden sm:flex sm:flex-col sm:items-end">
            <p class="text-sm leading-6 text-gray-900">Co-Founder / CEO</p>
            <p class="mt-1 text-xs leading-5 text-gray-500">Last seen <time datetime="2023-01-23T13:23Z">3h ago</time></p>
          </div>
        </li>
      </ul>
      </div>
      <MobileNav/>

</template>

<script setup>

import {Head} from '@inertiajs/vue3'
import Headers from '@/Components/HomeHeader.vue'
import MobileNav from '@/Components/MobileNav.vue'

</script>
