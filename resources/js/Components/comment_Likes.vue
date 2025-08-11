<template>
     <div class="flex items-center text-gray-500">
            <button class="group flex items-center space-x-1 text-gray-500 hover:text-pink-500 transition-colors" @click="like_Comment(comment_id)" >
  
  <svg
    xmlns="http://www.w3.org/2000/svg"
    fill="none"
    viewBox="0 0 24 24"
    stroke-width="1.5"
    stroke="currentColor"
    :class= "has_Like ? 'fill-pink-500 w-5 h-5 group-hover:fill-pink-500 group-hover:stroke-pink-500  transition-all ' : 'w-5 h-5 group-hover:fill-pink-500 group-hover:stroke-pink-500  transition-all' ">
    <path stroke-linecap="round" stroke-linejoin="round"
      d="M21.752 6.84c-.637-2.026-2.482-3.34-4.51-3.34-1.74 0-3.397.965-4.242 2.433A5.374 5.374 0 0 0 8.758 3.5c-2.027 0-3.872 1.314-4.51 3.34-.527 1.675-.26 3.65 1.22 5.362 1.1 1.25 2.68 2.45 4.43 3.77a31.447 31.447 0 0 0 2.104 1.472c.118.07.27.07.388 0a31.446 31.446 0 0 0 2.104-1.471c1.75-1.32 3.33-2.52 4.43-3.77 1.48-1.713 1.747-3.687 1.22-5.362Z" />
  </svg>
  <!-- Optional Like count -->
  <span class="text-sm font-medium">{{ like_Count }}</span>
</button>

</div>
</template>

    <script setup>

     const props=defineProps({comment_id:Number, has_Like:Boolean, like_Count:Number});
     const emit= defineEmits('like_Comment');


     function like_Comment(comment_id) {
        emit('like_Comment', comment_id);
     // console.log(id)
     }




     </script>