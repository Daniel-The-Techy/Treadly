<template>
    <Head title="Manage Post"/>
    <Auth>
   
        <div class="hidden h-[80vh] flex items-center justify-center">
    <div class="w-[400px] m-auto bg-white rounded-md border border-gray-200 px-8 py-4 text-center flex flex-col items-center ">
      <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-12 h-12 text-gray-400">
        <path stroke-linecap="round" stroke-linejoin="round" d="M12 10.5v6m3-3H9m4.06-7.19l-2.12-2.12a1.5 1.5 0 00-1.061-.44H4.5A2.25 2.25 0 002.25 6v12a2.25 2.25 0 002.25 2.25h15A2.25 2.25 0 0021.75 18V9a2.25 2.25 0 00-2.25-2.25h-5.379a1.5 1.5 0 01-1.06-.44z" />
      </svg>
      
      
      <h4 class="text-gray-700 font-semibold text-xl mt-2">No Posts</h4>
      <p class=" font-light text-slate-500">Get started by creating a post </p>


      <button class="bg-indigo-500 text-white hover:bg-indigo-700 px-4 py-2 inline-flex m-2 items-center rounded-md mt-4">
        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-6 h-6">
          <path fill-rule="evenodd" d="M12 5.25a.75.75 0 01.75.75v5.25H18a.75.75 0 010 1.5h-5.25V18a.75.75 0 01-1.5 0v-5.25H6a.75.75 0 010-1.5h5.25V6a.75.75 0 01.75-.75z" clip-rule="evenodd" />
        </svg>
        
        
        <Span class="text-sm font-semibold text-greeen-800 focus:ring-4 focus:outline-none focus:ring-blue-800 ">Create New Post</Span>
      
      </button>

      </div>
      </div>

      
      <form @submit.prevent="save">
           <div class="flex justify-between">
              <h2 class="text-[24px] font-medium text-black">Create New Post</h2>
              <div class="primary">
                 <button class="bg-primary-600 py-2 px-3 rounded-sm cursor-pointer   text-white">update</button>
                 <button class="bg-green-600 py-2 px-3 ml-2 rounded-sm cursor-pointer  text-white">Save</button>
              </div>
           </div>
     
           <div class="app flex flex-col md:flex-row divide-x space-y-4  md:space-x-4">
         
            <div>

      <div class="mt-3">
        <label class="mb-2 font-medium text-black">Title</label>
      <input type="text"  v-model="Form.title" class="mb-2 block w-full border border-gray-300 py-2 rounded-sm ">
    </div>


<div class="app " >
      <editor
        api-key="acs03r3z4s5grqj09zh9p9fzcmzgmp0l9ayt16de2iqdqg8b"
        :init="{
          height: 500,
          menubar: false,
          plugins: [
            'a11ychecker','advlist','advcode','advtable','autolink','checklist','export',
            'lists','link','image','charmap','preview','anchor','searchreplace','visualblocks',
            'powerpaste','fullscreen','formatpainter','insertdatetime','media','table','help','wordcount'
          ],
          toolbar:
            'undo redo | casechange blocks | bold italic backcolor | \
            alignleft aligncenter alignright alignjustify | \
            bullist numlst checklist outdent indent | removeformat | a11ycheck code table help'
        }"
        initial-value="Welcome to TinyMCE Vue"
        v-model="Form.content"
      />
    </div>

   <hr>
   </div>

   
 
  


<div class="bg-white w-full md:w-1/3 md:h-[80vh] mt-8 px-4 md:block py-8 rounded-sm">


  <div class="publish">
    <h3 class="text-xl text-black font-medium mb-4 ">Visibilty</h3>
   
    
   <p class="text-slate-500 text-sm mb-3">By default your Post will be saved to Draft make it visible by ticking the published checkbox</p>

  <div class="flex items-start mb-6">
    <div class="flex items-center h-5">
      <input id="remember" type="checkbox" value="Publish" v-model="Form.status" class="w-4 h-4 border border-gray-300 rounded bg-gray-50 focus:ring-3 focus:ring-blue-300 " required>
    </div>
    <label for="remember" class="ml-2 text-sm font-medium text-gray-900 ">Publish</label>
  </div>
  </div>

 
  



      <div class="">
        <label for="small" class="block mb-2 text-sm font-medium text-gray-900">Choose a Category</label>
<select id="small" v-model="Form.Categories_id" class="block w-full p-2 mb-6 text-sm text-gray-900 border border-gray-300 rounded-lg bg-gray-50 focus:ring-blue-500 focus:border-blue-500">
  
  
  <option selected>Choose a category</option>
  <option v-for="item in Categorys" :key="item.id" >{{ item.name }}</option>
  
 

</select>


     <div class="Customize">
         <h4>Add New Category</h4>
    <div class="flex gap-2">
         <input type="text" v-model="Category.name"   class="mb-2 block w-full border border-gray-300 py-2 rounded-sm">
         <button class="bg-emerald-600  px-3 text-white cursor-pointer rounded-md" @click="AddCategory">Add</button>
    </div>
     </div>
       </div>


       <div class="Cover Image mt-8">
        <h3>Upload Cover Image</h3>


        <div class="flex items-center justify-center w-full">
    <label for="dropzone-file" class="flex flex-col items-center justify-center w-full h-64 border-2 border-gray-300 border-dashed rounded-lg cursor-pointer bg-gray-50   hover:bg-gray-100">
        <div class="flex flex-col items-center justify-center pt-5 pb-6">
            <svg aria-hidden="true" class="w-10 h-10 mb-3 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 16a4 4 0 01-.88-7.903A5 5 0 1115.9 6L16 6a5 5 0 011 9.9M15 13l-3-3m0 0l-3 3m3-3v12"></path></svg>
            <p class="mb-2 text-sm text-gray-500 dark:text-gray-400"><span class="font-semibold">Click to upload</span> or drag and drop</p>
            <p class="text-xs text-gray-500 ">SVG, PNG, JPG  (MAX. 800x400px)</p>
        </div>
        <input id="dropzone-file" type="file" @change="onImageChoose" class="hidden" />
    </label>
</div> 


       </div>


    </div>
  
    </div>
  </form>



    </Auth>
    
</template>

<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import Auth from '@/Layouts/Auth.vue'
import { Head, useForm } from '@inertiajs/vue3';
import Text from '@/Components/Text.vue'
import Editor from '@tinymce/tinymce-vue'


 defineProps({Categorys:String})


const Form=useForm({
  title:"",
  content:"",
  status:"",
  Categories_id:"",
  Cover_image:""
});

const save = () => {
   Form.post(route('Posts.save'));
}



const Category=useForm({
  name:''
});

function AddCategory(){
  Category.post(route('Category.save'),{
    onFinsh:() => Category.get(route('posts'))
  });
  
}

function onImageChoose(e){
    let file=e.target.files[0];

    const reader=new FileReader()

    reader.onload=()=> {
        Form.Cover_image=reader.result
    }
    reader.readAsDataURL(file)
}
   
</script>