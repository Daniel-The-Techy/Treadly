<template>
  
    <Head title="HomePage" />

   
<body class="bg-gray-50 text-gray-800">

  <!-- Header -->
  <header class="sticky top-0 bg-white shadow z-50">
    <div class="max-w-7xl mx-auto flex items-center justify-between p-4">
      <h1 class="text-2xl font-bold text-blue-600">MicroBlog</h1>
      <nav class="hidden md:flex gap-6">
        <a href="#" class="hover:text-blue-600">Home</a>
        <a href="#" class="hover:text-blue-600">Explore</a>
        <a href="#" class="hover:text-blue-600">Categories</a>
      </nav>
      <div class="flex items-center gap-4">
        <input type="text" placeholder="Search..." class="px-3 py-1 border rounded-lg focus:ring focus:ring-blue-200" />
        <button class="bg-blue-600 text-white px-4 py-1 rounded-lg hover:bg-blue-700">Login</button>
      </div>
    </div>
  </header>

  <!-- Hero -->
  <section class="bg-blue-600 text-white py-12">
    <div class="max-w-4xl mx-auto text-center">
      <h2 class="text-4xl font-bold mb-4">Share your voice with the world 🌍</h2>
      <p class="mb-6 text-lg">Join a growing community of writers and readers.</p>
      <div class="flex justify-center gap-4">
        <button class="bg-white text-blue-600 font-semibold px-6 py-2 rounded-lg hover:bg-gray-200">Start Writing</button>
        <button class="border border-white px-6 py-2 rounded-lg hover:bg-white hover:text-blue-600">Explore Posts</button>
      </div>
    </div>
  </section>

  <!-- Main Layout -->
  <main class="max-w-7xl mx-auto grid grid-cols-1 md:grid-cols-3 gap-8 py-10 px-4">
    
    <!-- Feed -->
    <div class="md:col-span-2 space-y-6">
      <h3 class="text-xl font-bold mb-2">Latest Posts</h3>

      <!-- Post Card -->
      <div class="bg-white p-4 rounded-xl shadow">
        <div class="flex items-center gap-3 mb-3">
          <img src="https://i.pravatar.cc/40" class="w-10 h-10 rounded-full" alt="user">
          <div>
            <p class="font-semibold">@janedoe</p>
            <p class="text-xs text-gray-500">2h ago</p>
          </div>
        </div>
        <p class="mb-3">Just launched my new project using Laravel + Inertia 🚀🔥 #webdev #laravel</p>
        <div class="flex items-center gap-6 text-gray-500 text-sm">
          <span>❤️ 24</span>
          <span>💬 8</span>
          <span>👁️ 120</span>
        </div>
      </div>

      <!-- Post Card -->
      <div class="bg-white p-4 rounded-xl shadow">
        <div class="flex items-center gap-3 mb-3">
          <img src="https://i.pravatar.cc/41" class="w-10 h-10 rounded-full" alt="user">
          <div>
            <p class="font-semibold">@johnsmith</p>
            <p class="text-xs text-gray-500">5h ago</p>
          </div>
        </div>
        <p class="mb-3">Exploring AI-generated art today... pretty mind-blowing 😱🎨 #AI #design</p>
        <div class="flex items-center gap-6 text-gray-500 text-sm">
          <span>❤️ 45</span>
          <span>💬 12</span>
          <span>👁️ 310</span>
        </div>
      </div>

    </div>

    <!-- Sidebar -->
    <aside class="space-y-6">

      <!-- Trending Topics -->
      <div class="bg-white p-4 rounded-xl shadow">
        <h4 class="font-semibold mb-3">🔥 Trending Topics</h4>
        <div class="flex flex-wrap gap-2">
          <span class="px-3 py-1 bg-blue-100 text-blue-600 rounded-full text-sm">#Laravel</span>
          <span class="px-3 py-1 bg-green-100 text-green-600 rounded-full text-sm">#AI</span>
          <span class="px-3 py-1 bg-purple-100 text-purple-600 rounded-full text-sm">#Design</span>
          <span class="px-3 py-1 bg-pink-100 text-pink-600 rounded-full text-sm">#Health</span>
          <span class="px-3 py-1 bg-yellow-100 text-yellow-600 rounded-full text-sm">#Travel</span>
        </div>
      </div>

      <!-- Top Contributors -->
      <div class="bg-white p-4 rounded-xl shadow">
        <h4 class="font-semibold mb-3">🏆 Top Contributors</h4>
        <div class="space-y-3">
          <div class="flex items-center gap-3">
            <img src="https://i.pravatar.cc/42" class="w-8 h-8 rounded-full">
            <p class="text-sm font-medium">@creativecoder <span class="text-gray-500">(150 posts)</span></p>
          </div>
          <div class="flex items-center gap-3">
            <img src="https://i.pravatar.cc/43" class="w-8 h-8 rounded-full">
            <p class="text-sm font-medium">@traveldiaries <span class="text-gray-500">(98 posts)</span></p>
          </div>
        </div>
      </div>

      <!-- Community Stats -->
      <div class="bg-white p-4 rounded-xl shadow text-center">
        <h4 class="font-semibold mb-2">🌐 Community</h4>
        <p class="text-sm text-gray-600">2,000+ Writers</p>
        <p class="text-sm text-gray-600">50,000+ Posts</p>
        <p class="text-sm text-gray-600">10,000+ Comments</p>
      </div>

    </aside>
  </main>

  <!-- Footer -->
  <footer class="bg-white shadow mt-10">
    <div class="max-w-7xl mx-auto p-6 flex flex-col md:flex-row justify-between text-gray-600 text-sm">
      <p>© 2025 MicroBlog. All rights reserved.</p>
      <div class="flex gap-4 mt-3 md:mt-0">
        <a href="#">Privacy</a>
        <a href="#">Terms</a>
        <a href="#">About</a>
        <a href="#">Contact</a>
      </div>
    </div>
  </footer>
</body>

</template>

<script setup>
import Headers from "@/Components/HomeHeader.vue";
import { Head } from "@inertiajs/vue3";

import MobileNav from "@/Components/MobileNav.vue";

const props=defineProps({posts:Array})
</script>
