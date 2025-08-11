<template>
    <h1>Followers</h1>
           


          <div class="sm:container mx-auto  py-4 mt-4 bg-white">
            <div class="mb-4">
    
        

                    <ul role="list" class="divide-y divide-gray-100">
   


        <li class="flex justify-between gap-6 py-5 " v-for="item in UserFollowers" :key="item.id">
          
          <div class="inline-flex gap-4">
            <img class="h-12 w-12 md:h-16 md:w-16  rounded-full bg-gray-50"    :src="`/${item.image}`" alt="">

               <div>
              <p class="text-xl font-semibold py-2  text-gray-900">{{item.name }}</p>
              <p class="text-xs text-gray-500">@{{ item.Username }}</p>
              </div>

              
            </div>

          
          
          <div class="sm:flex sm:flex-col sm:items-end" >
           
             <div v-if="status[item.id]">

              <button  v-if="Auth" class="bg-gray-200 border border-gray-100  hover:bg-gray-300 py-2 px-4 md:px-12 text-gray-800 font-semibold text-base rounded-full md:rounded-full"
              type="button" @click="Follow(item.id)">Following</button>
             </div>

             <div v-else>
              <button v-if="Auth" class="bg-blue-600    hover:bg-blue-700  py-2 px-4 md:px-12 text-white font-semibold text-base rounded-full md:rounded-full"
           type="button" @click="Follow(item.id)" >Follow back</button>
           </div>


            

            

           

          <!----- <Link :href="route('profile')" method="get" as="button"
             class="block px-4 py-2 bg-green-500 text-sm w-full text-gray-700 hover:bg-indigo-600 hover:text-white" @click="Follow(item.pivot.Follower_id)"
           type="button">Follow</Link>  --->

           
          </div>

         
        </li>


      

        </ul>
                </div>


                </div>

          
</template>



<script setup>

const props=defineProps({UserFollowers:Array, status:Object, id:Number, Auth:Boolean})

const emits=defineEmits('Follow')



   function Follow(id){
     emits('Follow', id)
   }

</script>