
<template>
    <Header/>
    
    <div class="bg-white ">
        <div class="md:container min-h-screen mx-auto   md:px-8  py-2 ">
        <div class="grid px-4 grid-cols-4 md:grid-cols-12 md:gap-36">

            <div class="col-span-4 sm:col-span-4 lg:col-span-6 md:col-span-6 mt-4">
              <div class="w-full">
                <img :src="`/${posts.Cover_image}`" class=" w-full  h-[50vh] m-auto rounded-md object-cover">
        </div>
   <div class="text-5xl md:px-12 mt-4 text-black max-w-prose   text-center tracking-wider font-extrabold" v-html="posts.title"></div>

   <div class="px-4 py-3 mt-3">
    <p class=" text-gray-600  text-base">Published on <span class="font-medium text-gray-800">August 3, 2022, 2:20am</span>
    . {{ readingTime }} min read
    </p>
   <p class="text-slate-500 tracking-wider">By <span class="font-bold text-xl text-gray-500">{{ posts.user.profile.Username }}</span></p>
</div>
   
          <div class="mt-8  px-4 md:max-w-5xl  m-auto   max-w-prose  text-base leading-relaxed tracking-wider lead" v-html="posts.content"></div>
    <div>
          <button
      id="likeBtn"
      class="mt-3 flex items-center space-x-1 text-gray-500 hover:text-red-500 transition"
      @click="toggleLike()"
    >
    <p>Like</p>
      <svg
        id="likeIcon"
        xmlns="http://www.w3.org/2000/svg"
        class="h-6 w-6"
        fill="none"
        viewBox="0 0 24 24"
        stroke="currentColor"
        stroke-width="2"
        :class= "postLikeStatus ? 'fill-pink-500 w-5 h-5 group-hover:fill-pink-500 group-hover:stroke-pink-500  transition-all ' : 'w-5 h-5 group-hover:fill-pink-500 group-hover:stroke-pink-500  transition-all' ">
      >
        <path
          id="likePath"
          stroke-linecap="round"
          stroke-linejoin="round"
          d="M4.318 6.318a4.5 4.5 0 016.364 0L12 7.636l1.318-1.318a4.5 4.5 0 116.364 6.364L12 20.364l-7.682-7.682a4.5 4.5 0 010-6.364z"
        />
      </svg>
      <span id="likeText">{{ postLikeCount }}</span>
    </button>

    
</div>

  <!----Comment section-->

          <section class="not-format">
                    <div class="flex justify-between items-center mb-6">
                        <h2 class="text-lg lg:text-2xl font-bold text-gray-900 ">Discussion ({{ posts.comment.length}})</h2>
                    </div>


                    <form @submit.prevent="addComment(posts.id)">
                        <div class="py-2 px-4 mb-4 bg-white rounded-lg rounded-t-lg border border-gray-200 " id="Comment">
                            <label for="comment" class="sr-only">Your comment</label>
                            <textarea id="comment" rows="6"
                                class="px-0 w-full text-sm text-gray-900 border-0 focus:ring-0 " v-model="comment.content"
                                placeholder="Write a comment..." required></textarea>
                               
                        </div>
                        <button
                            class="inline-flex items-center py-2.5 px-4 text-xs font-medium text-center text-white bg-primary-700 rounded-lg focus:ring-4 focus:ring-primary-200  hover:bg-primary-800">
                            {{ action ? 'Post Comment' : 'Post Reply'  }}
                        </button>
                    </form>
                    
              
     
     <Comment 
     :comments="comments"
     :has_Like="has_Like"
      :editCommentDropdown="editCommentDropdown"
      :closeEditDropdown="closeEditDropdown"
      :canEditReply="canEditReply"
     @toggledropdownComment="toggledropdownComment"
          @toggleReplyDropdown="toggleReplyDropdown"
          @Check="Check"
          @commentAuthCheck="commentAuthCheck"
          @removeComment="removeComment"
          @removeReply="removeReply"
          @editComment="editComment"
          @showCommentData="showCommentData"

             />


</section>
</div>





<div class="md:col-span-4  hidden lg:block">
    
            <div class="block w-full p-6 mt-8  bg-white border border-gray-200 rounded-lg shadow hover:bg-gray-100 "
             v-if="$page.props.auth.user?.id  !== posts.user_id">
              <div class="px-4  max-w-md w-full ">
              <div class="flex items-center space-x-4">
                    <img :src="`/${posts.Cover_image}`" class="w-[50px] h-[50px] rounded-full">
      
                    <div class="shrink-0">
                     <h1 class="text-xl text-black font-medium">{{ posts.user.profile.Username }}</h1>
                     <p class="text-slate-500 font-medium tracking-wider">{{ Followers_Count }} Followers</p>
                    </div>
      
                   </div>
      
                 
                   <div class="content mt-4 max-w-prose">
                   <small class="text-slate-500 text-center text-base">{{ posts.user.profile.About.slice(0, 100)}}</small>
                          <div class="location mt-4">
                            <h1 class="font-bold text-xl text-black">Location</h1>
                            <p class="text-slate-500">{{ posts.user.profile.Country }}, United States</p>
                          </div>
      
                          <div class="joined mt-4">
                            <h1 class="font-bold text-xl text-black">Joined</h1>
                            <p class="text-slate-500">{{ formatDate(posts.user.profile.created_at)}}</p>
                          </div>
      
                          <div class="button mt-4">
                            <button class="bg-blue-500 text-white rounded-md cursor-pointer px-12 
                            w-full hover:bg-blue-800 py-3 text-center "  @click="Follow(posts.user.id)">{{ status  ? 'Following' : 'Follow'}}</button>
                          </div>
    
                   </div>
                
                  </div>
                
                
            </div>
        
        
            
      
            <div class="block p-6 mt-8   bg-white border border-gray-200 rounded-lg shadow hover:bg-gray-100">
           <h3>Latest Post</h3>
      
           <div class="flex flex-col space-y-4 items-center">
             
            <div class="flex flex-row space-x-3 mt-4" v-for="newPost in latestPost" :key="newPost.id">
              <img :src="`/${newPost.Cover_image}`"  class="w-[80px] h-[80px] rounded-md">
              
              <div class="content max-w-prose">
            <p v-html="newPost.content.slice(0, 100)"></p>
          
                          <Link :href="route('Post.show',  [newPost.id, newPost.slug])">
                                  <span class="inline-flex items-center font-medium underline underline-offset-4 text-primary-600 dark:text-primary-500 hover:no-underline"> Read more</span>
                                       
                                    </Link>
              </div>
      
            </div>
      
      
           

     </div>

        
     
 </div>
 </div>
 </div>
 </div>
 

      
      


          

                <aside aria-label="Related articles" class=" py-8 lg:py-24 bg-gray-50 dark:bg-gray-800 w-full">
        <div class="px-4 mx-auto max-w-screen-xl">
            <h2 class="mb-8 text-2xl font-bold text-gray-900 dark:text-white">Related articles</h2>
            <div class="grid gap-12 sm:grid-cols-2 lg:grid-cols-4"  >
                <article class="max-w-xs"   v-for="post in relatedPost" :key="post.id">
                    
                        <img :src="`/${post.Cover_image}`" class="mb-5 rounded-lg" alt="Image 1">
                   
                    <h2 class="mb-2 text-xl font-bold leading-tight text-gray-900 dark:text-white">
                        <Link :href="route('Post.show',  [post.id, post.slug])">{{ post.title }}</Link>
                    </h2>
                    <p class="mb-4 font-light text-gray-500 dark:text-gray-400" v-html="post.content.slice(0, 300)"></p>
                    <Link :href="route('Post.show',  [post.id, post.slug])" class="inline-flex items-center font-medium underline underline-offset-4 text-primary-600 dark:text-primary-500 hover:no-underline">
                        Read in {{ post.reading_time }} minutes
                    </Link>
                </article>
               
            </div>
        </div>
      </aside>
      





        </div>
    
          
          

     
</template>

<script setup>
import Header from '@/Components/HomeHeader.vue';
import { useForm, usePage } from '@inertiajs/vue3';
import { ref } from 'vue';
import Auth from '@/Layouts/Auth.vue';
import { router } from '@inertiajs/vue3';
import Comment from  '@/Components/Comment.vue'
import { split } from 'postcss/lib/list';
import { formatDate } from '@/Utils/FormatDate.vue';

import { Link } from '@inertiajs/vue3';
//import { router } from '@inertiajs/vue3';


let action=ref(true)
const reply_Comment_Id=ref('')
const dropdownComment=ref(false)
const CommentDropdown=ref(false)
let ownerComment=ref(false);
let canEdit=ref(false);
const  editCommentDropdown=ref(false);
const closeEditDropdown=ref(false)
const props=defineProps({posts:Object, workings:String, postLikeStatus:Boolean, postLikeCount:Number,
   comments:Array, has_Like:Boolean, postViewsCount:Number, Followers_Count:Number, canEditComment:Boolean, status:Object,
    canEditReply:Boolean, Auth:Number, readingTime:Number, commentUpdate:Object, latestPost:Object, relatedPost:Object})

    const user=usePage().props.auth
    console.log(user)

const comment=useForm(
    {
        content:'',
        posts_id:''
      });

      
    console.log(props)

    const post_like=useForm(
    {
        posts_id:'',
   });

const Reply=useForm({
        content:'',
        comments_id:''
      });
     

const Check =(id) => {
   action.value=!action.value;
    reply_Comment_Id.value=id

}

  const showCommentData = (id) =>{
     editCommentDropdown.value=!editCommentDropdown.value
    
     const Comment=[...props.comments]

     const comments=Comment.find(p => p.user.user_id === id);
     if(comments){
          comments.visibilitys=!comments.visibility
            console.log(comments.visibilitys)
      }
      
   }

   

const addComment = (id) => {
    
 if(action.value){
    //  comment.post(route('Comment.create'),  {
     // onFinish: () =>router.get('Post.show'),
   //   preserveScroll: true,
    //     })

         router.post(`/Post/${id}/comment`, {content:comment.content, preserveScroll:true})
        
}else{
    
    Reply.comments_id=reply_Comment_Id.value,
     Reply.content=comment.content
     console.log(Reply.comments_id)
         Reply.post(route('Reply.create'), {
          //    onFinish: () =>Reply.get(route('Post.show')),
          preserveScroll: true,
          })
          action.value=!action.value
      }
    
    
}




const isUserComment = (comment_id) => {
    
    const comment=[...props.posts.comment]

      if(props.Auth === comment_id){
           ownerComment.value=!ownerComment.value
      }
}

const toggledropdownComment =(id) => {
        const Comment=[...props.comments]

    const comments=Comment.find(p => p.id === id);
    if(comments){
        comments.visibility=!comments.visibility
    }

     console.log(comments.visibility)
}

 const toggleReplyDropdown =(id) => {
    const Replys=[...props.comments]
    Replys.forEach((rep) => {
       const ReplyId=rep.reply.find(reply => reply.id === id)
         console.log(id)
       if(ReplyId){
           ReplyId.visibilty=!ReplyId.visibilty
       }
    })
}


   
 
 

   
    

    function commentAuthCheck(comment_user_id) {

    const comment = [...props.posts.comment];
    const AuthenticatedUserId = props.Auth;

    if (AuthenticatedUserId === comment_user_id) {
        canEdit.value = !canEdit.value;
    }

    if (props.Auth === comment_user_id) {
        ownerComment.value = !ownerComment.value;
    }





}

        function toggleLike(){
          //  post_like.posts_id=id;

           // post_like.post(route('post.like'), {
            //    preserveScroll:true
           //  });

           router.post(`/posts/${props.posts.id}/like`, {preserveScroll:true})
              console.log(props.posts.id);
             
        }


        function removeComment(comment_id){
                  
            router.delete(`/Home/Comment/d/${comment_id}`,  { preserveScroll: true})
         
        }
         

        function removeReply(Reply_id){
                  
                  router.delete(`/Home/Reply/d/${Reply_id}`, { preserveScroll: true})
                //  console.log(comment_id)
              }


              const editComment = (comment_id, data) => {
                    
                router.put(`/Home/Comment/edit/${comment_id}`, {content:data}, {preserveScroll: true})

                  closeEditDropdown=!closeEditDropdown
              }

            //  const Follow = (id) => {
             //   router.post('/Home/Profile/f/' + id, {preserveScroll:true} );
          //  }

          function Follow (id)  {
             router.post(`/Profiles/${id}/follow`,   {preserveScroll:true} );
          }

   
</script>