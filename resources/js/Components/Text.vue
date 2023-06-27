<template>
      <form @submit.prevent="save">
    <div id="app">

      <div class="mt-3">
      <input type="text"  v-model="form.key">
    </div>


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
        v-model="form.text"
      />
    </div>

   

    <div class="mt-3">
        <button class="bg-emerald-700 py-3 px-8 text-white">Submit</button>
    </div>
</form>
    </template>

<style scoped>
.logo {
  display: block;
  margin: 0 auto 2rem;
}

@media (min-width: 1024px) {
  #sample {
    display: flex;
    flex-direction: column;
    place-items: center;
    width: 1000px;
  }
}
</style>
    
    <script setup>
    import Editor from '@tinymce/tinymce-vue'
    import {ref} from 'vue'
    
   
    const form={
        text:'',
        key:''
    };

    function save(){
        console.log(form)
    }
    </script>