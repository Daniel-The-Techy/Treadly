<template>
    
<h2>Testing</h2>
    <Head title="Community blog"/>
    <div v-for="item in User" :key="item.id">
    <h2>This is Inertia js</h2>

    <h2>Welcome {{ item.name }}</h2>
    <h3>Your email address is {{ item.email }}</h3>
    </div>


</template>

<script setup>

import  {Head} from '@inertiajs/vue3'



   defineProps({User:Object})
</script>
