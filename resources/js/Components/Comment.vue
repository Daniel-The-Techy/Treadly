<template>


 
    <div class="bg-white mt-4 w-full mb-4 relative inline-block" v-if="$page.props.auth.user">
        <div v-for="item in comments" :key="item.id" >
                    <article class="p-6 mb-6 text-base bg-slate-50  rounded-lg " >
                        <footer class="flex justify-between items-center mb-2">
                            <div class="flex items-center">
                                <p class="inline-flex items-center mr-3 text-sm text-gray-900 "><img
                                        class="mr-2 w-6 h-6 rounded-full"
                                        :src="`/${item.user.Cover_image ?? 'not found'}`"
                                        alt="Michael Gough">{{ item.user.Username}}</p>
                                <p class="text-sm text-gray-600 "><time pubdate datetime="2022-02-08"
                                        title="February 8th, 2022">Feb. 8, 2022</time></p>
                            </div>
                            <button id='dropdownComment1Button' data-dropdown-toggle="dropdownComment" @click="toggledropdownComment(item.id)"
                                class="inline-flex items-center p-2 text-sm font-medium text-center relative text-gray-400   bg-white rounded-lg hover:bg-gray-100 focus:ring-4
                                 focus:outline-none focus:ring-gray-50 "
                                type="button">
                                <svg class="w-5 h-5 " aria-hidden="true" fill="currentColor" viewBox="0 0 20 20"
                                 @click="commentAuthCheck(item.user.user_id)" 
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path
                                        d="M6 10a2 2 0 11-4 0 2 2 0 014 0zM12 10a2 2 0 11-4 0 2 2 0 014 0zM16 12a2 2 0 100-4 2 2 0 000 4z">
                                    </path>
                                </svg>
                                <span class="sr-only">Comment settings</span>
                            
                            </button>
                            <!-- Dropdown menu -->
                          
                           
                
                            <div id="dropdownComment1" v-if="item.visibility"
                                class="absolute right-0 mt-28 w-44 origin-top-right bg-white border border-gray-200 rounded-md shadow-lg z-50  
                                ">
                            
                                <ul class="py-1 text-sm text-gray-700 "
                                    aria-labelledby="dropdownMenuIconHorizontalButton">
                                    <li>
                                        <button v-if="item.can.update" @click="showCommentData(item.id)"
                                     class="block py-2 px-4 hover:bg-gray-100">Edit</button>
                                    </li>
                                    <li>
                                        <button v-if="item.can.delete"  @click="removeComment(item.id)" 
                                            class="block py-2 px-4 hover:bg-gray-100">Remove</button>
                                    </li>
                                    <li>
                                        <button v-if="item.can.report"
                                            class="block py-2 px-4 hover:bg-gray-100">Report</button>
                                    </li>
                                </ul>



                            </div>
                        </footer>
                        <p> {{ item.content }}</p>

                        <div class="flex items-center mt-4 space-x-4">

                   <Comment_Likes  @like_Comment="like_Comment"  :comment_id="item.id" :has_Like="item.has_Like" :like_Count="item.like_Count"/>



                            <div>
                            <a href="#Comment" @click="Check(item.id)"
                                class="flex items-center text-sm text-gray-500 hover:underline dark:text-gray-400">
                                
                                <svg aria-hidden="true" class="mr-1 w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z"></path></svg>
                                Reply
                        </a>
                            </div>

                           
                       

                        </div>

                <div v-if="editCommentDropdown">
                    
                        <form @submit.prevent="editComment(item.id, item.content)">
                            <div class="flex gap-4" v-if="!closeEditDropdown && item.visibility">
                            <textarea class="mt-2  w-full rounded-md border-none" placeholder="Edit your comment" v-model="item.content"></textarea>
                            <button class="w-[70px] h-[70px] bg-green-600 rounded-full text-white cursor-pointer border-none outline-none">Send</button>
                            </div>
                        </form>
                        </div>
                       
                    </article>
                 

                    <div v-for="replyData in item.reply" :key="replyData.id">
                    <article class="p-6 mb-6 ml-6 lg:ml-12 text-base bg-gray-50 rounded-l ">
                        <footer class="flex justify-between items-center mb-2">
                            <div class="flex items-center">
                                <p class="inline-flex items-center mr-3 text-sm text-gray-900 "><img
                                        class="mr-2 w-6 h-6 rounded-full"
                                        :src="`/${replyData.user.Cover_image}`"
                                        alt="Jese Leos">{{replyData.user.Username }}</p>
                                <p class="text-sm text-gray-600 "><time pubdate datetime="2022-02-12"
                                        title="February 12th, 2022">Feb. 12, 2022</time></p>
                            </div>
                            
                            <button id='dropdownComment2Button' data-dropdown-toggle="dropdownComment2" 
                            @click="toggleReplyDropdown(replyData.id)" 
                                class="inline-flex items-center p-2 text-sm font-medium text-center relative text-gray-400   bg-white rounded-lg hover:bg-gray-100 focus:ring-4
                                 focus:outline-none focus:ring-gray-50 "
                                type="button">
                                <svg class="w-5 h-5" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20" @click="commentAuthCheck(replyData.user_id)"
                                    xmlns="http://www.w3.org/2000/svg" v-if="canEditReply">
                                    <path
                                        d="M6 10a2 2 0 11-4 0 2 2 0 014 0zM12 10a2 2 0 11-4 0 2 2 0 014 0zM16 12a2 2 0 100-4 2 2 0 000 4z">
                                    </path>
                                </svg>
                                <span class="sr-only">Comment settings</span>
                            </button>
                            
                            <!-- Dropdown menu -->
                            <div id="dropdownComment2"    v-if="replyData.visibilty"
                               
                                class="absolute right-0 mt-40 w-44 origin-top-right bg-white border border-gray-200 rounded-md shadow-lg z-50 ">
                                
                                <ul class="py-1 text-sm text-gray-700 "
                                    aria-labelledby="dropdownMenuIconHorizontalButton" v-if="canEditReply">
                                    <li>
                                        <button v-if="replyData.can.update"
                                         class="block py-2 px-4 hover:bg-gray-100">Edit</button>
                                    </li>
                                    <li>
                                        <button v-if="replyData.can.delete"  @click.prevent=removeReply(replyData.id)
                                            class="block py-2 px-4 hover:bg-gray-100 ">Remove</button>
                                    </li>
                                    <li>
                                        <button v-if="replyData.can.report"
                                            class="block py-2 px-4 hover:bg-gray-100 ">Report</button>
                                    </li>
                                </ul>

                                <ul class="py-1 text-sm text-gray-700"
                                    aria-labelledby="dropdownMenuIconHorizontalButton" v-else>
                                    <li>
                                        <button
                                           v-if="canEdit" class="block py-2 px-4 hover:bg-gray-100">Edit</button>
                                    </li>

                                    <li>
                                        <button 
                                            class="block py-2 px-4 hover:bg-gray-100">Report</button>
                                    </li>
                                </ul>
                                
                            </div>
                        </footer>
                        <div >
                        
                        <p>{{ replyData.body}}</p>
                        </div>
                        <div class="flex items-center mt-4 space-x-4">
                            <button type="button"
                                class="flex items-center text-sm text-gray-500 hover:underline dark:text-gray-400">
                                <svg aria-hidden="true" class="mr-1 w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z"></path></svg>
                                Reply
                            </button>
                        </div>
                    </article>
                    </div>
                    </div>
                 

</div>


<div v-else class="mt-4">

    <h1 class="text-base text-gray-600 font-medium">Register Account before you can comment or view comment</h1>
</div>
                    

                  






</template>

<script setup>

import {computed} from 'vue'
import Comment_Likes from './comment_Likes.vue';
import { useForm } from '@inertiajs/vue3';
import { router } from '@inertiajs/vue3';

   const props=defineProps({comments:Array, 
                         closeEditDropdown:Boolean,
                          //  canEdit:Boolean, 
                          //  dropdownComment:Boolean, 
                           editCommentDropdown:Boolean, 
                           
                           //  action:Boolean,
                         //   canEditComment:Boolean, 
                            canEditReply:Boolean,
                         //   commentUpdate:Object
    })

 const emit=defineEmits('toggledropdownComment', 
                        'toggleReplyDropdown', 
                        'Check', 
                        'commentAuthCheck', 
                          'removeComment',
                         'removeReply', 
                         'editComment',
                        'showCommentData');

                        console.log(Comment)


const comment=computed(() => props.comments)
console.log(comment
)
const action=computed(()=> props.action)



      const like_Comment = (comment_id) => {
     //  comment_like.comments_id=id;
     //     comment_like.post(route('like_Comment'), {
        //      preserveScroll:true
        //  })
         
             router.post(`/comment/${comment_id}/like`, {preserveScroll:true})
      }




   function toggledropdownComment(id){

       emit("toggledropdownComment", id)
   }

   function toggleReplyDropdown(id){

       emit("toggleReplyDropdown", id)
   }

   function Check(id){

        emit("Check", id)
   }

   function commentAuthCheck(comment_user_id){

         emit("commentAuthCheck", comment_user_id)
   }

   function removeComment(comment_id){

         emit("removeComment", comment_id)
   }

   function removeReply(Reply_id){

       emit("removeReply", Reply_id)
   }

   function showCommentData(id){

         emit("showCommentData", id)
   }

     function editComment(id, data){
        
           emit("editComment", id, data)
     }


     </script>