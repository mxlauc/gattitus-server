<template>
    <div class="position-relative">
        <div class="reactions-container">
            <div class="xdxd">
                <img class="img-reaction" src="https://firebasestorage.googleapis.com/v0/b/proyectoxdxd-6a713.appspot.com/o/gattitus%2Fimgs%2F17d66e46918_a39c282d-1ff7-4640-9373-e66831f6f203.svg?alt=media&token=e1d60e6c-e2a3-4650-9a22-0ab913130141">
            </div>
            <div class="xdxd">
                <img class="img-reaction" src="https://firebasestorage.googleapis.com/v0/b/proyectoxdxd-6a713.appspot.com/o/gattitus%2Fimgs%2F17d66e46918_a39c282d-1ff7-4640-9373-e66831f6f203.svg?alt=media&token=e1d60e6c-e2a3-4650-9a22-0ab913130141">
            </div>
            <div class="xdxd">
                <img class="img-reaction" src="https://firebasestorage.googleapis.com/v0/b/proyectoxdxd-6a713.appspot.com/o/gattitus%2Fimgs%2F17d66e46918_a39c282d-1ff7-4640-9373-e66831f6f203.svg?alt=media&token=e1d60e6c-e2a3-4650-9a22-0ab913130141">
            </div>
            <div class="xdxd">
                <img class="img-reaction" src="https://firebasestorage.googleapis.com/v0/b/proyectoxdxd-6a713.appspot.com/o/gattitus%2Fimgs%2F17d66e46918_a39c282d-1ff7-4640-9373-e66831f6f203.svg?alt=media&token=e1d60e6c-e2a3-4650-9a22-0ab913130141">
            </div>
            <div class="xdxd">
                <img class="img-reaction" src="https://firebasestorage.googleapis.com/v0/b/proyectoxdxd-6a713.appspot.com/o/gattitus%2Fimgs%2F17d66e46918_a39c282d-1ff7-4640-9373-e66831f6f203.svg?alt=media&token=e1d60e6c-e2a3-4650-9a22-0ab913130141">
            </div>
            <div class="xdxd">
                <img class="img-reaction" src="https://firebasestorage.googleapis.com/v0/b/proyectoxdxd-6a713.appspot.com/o/gattitus%2Fimgs%2F17d66e46918_a39c282d-1ff7-4640-9373-e66831f6f203.svg?alt=media&token=e1d60e6c-e2a3-4650-9a22-0ab913130141">
            </div>
            
        </div>
    </div>    
</template>
<script>
export default {
    
}
</script>
<style scoped>
.img-reaction{
    width: 40px;
    height: 40px;
    margin: 2px;
    margin-top: 25px;
    transition: margin-top 0.2s cubic-bezier(0.4, -1, 0.6, 2),
                transform 0.2s cubic-bezier(0.4, -1, 0.6, 2);
    box-shadow: 0px 8px 8px rgba(0, 0, 0, 0.3);
    border-radius: 50%;
}
.reactions-container{
    width: max-content;
    position: absolute;
    bottom: 100%;
    left: 50%;
    transform: translateX(-50%);
}
.xdxd{
    height: 80px;
    width: 44px;
    float: left;
}
.xdxd:hover .img-reaction{
    margin-top: 20px;
    transform: scale(1.2);
}
</style>