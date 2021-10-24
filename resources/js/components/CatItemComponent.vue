<template>
<div class="text-center">
    <img :src="image" class="cat-item-img shadow">
    <span class="d-block mt-2 text-muted"><small>{{name}}</small></span>
</div>    
</template>
<script>
export default {
    props: ['name', 'image']
}
</script>
<style scoped>
.cat-item-img{
    width: 100%;
    border-radius: 20%;
    aspect-ratio: 1;
    object-fit: cover;
}
</style>