<template>
    <div class="p-1">
        <img :src="imgUrl" ref="img"
            class="w-100" style="border-radius:5px">
    </div>
</template>
<script>
import Masonry from 'masonry-layout';
export default {
    props: ['imgUrl'],
    inject: ['postId'],
    mounted(){
        new ResizeObserver(()=> {
            var msnry = new Masonry("#masonry-gifs-row" + this.postId, {
                percentPosition: true,
            });
        }).observe(this.$refs.img);
    }
}
</script>
<style scoped>

</style>
