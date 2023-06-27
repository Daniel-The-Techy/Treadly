<script setup>
defineProps({
    type: {
        type: String,
        default: 'submit',
    },
});
</script>

<template>
    <button
        :type="type"
        class="w-full  text-white bg-primary-600 hover:bg-primary-700 focus:ring-4 focus:outline-none focus:ring-primary-300 
        font-medium rounded-md text-sm px-8 py-4 text-center mb-3 mt-4">
        <slot />
    </button>
</template>
