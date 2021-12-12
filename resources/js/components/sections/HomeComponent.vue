<template>
    
<div class="row g-0">
    <div class="col-12 col-md-8">
        <div style="max-width: 500px; margin: auto;">
            <simple-post-component v-for="p in posts" :post="p" :key="p.id"></simple-post-component>
        </div>
    </div>
    <div class="col-12 col-md-4 sticky-top" style="max-width: 400px; max-width: 100%; align-self: flex-start; top: 80px;">
        <div class="card shadow-sm mb-3" >

            <div class="card-body">
                <h5 class="card-title">Card title</h5>
                <p class="card-text">Some quick example text to build on the card title and make up the
                    bulk of the card's content.</p>
                <a href="#" class="btn btn-primary">Go somewhere</a>
            </div>
        </div>
        <div class="card shadow-sm mb-3" >

            <div class="card-body">
                <h5 class="card-title">Card title</h5>
                <p class="card-text">Some quick example text to build on the card title and make up the
                    bulk of the card's content.</p>
                <a href="#" class="btn btn-primary">Go somewhere</a>
            </div>
        </div>
        <div class="card shadow-sm mb-3" >

            <div class="card-body">
                <h5 class="card-title">Card title</h5>
                <p class="card-text">Some quick example text to build on the card title and make up the
                    bulk of the card's content.</p>
                <a href="#" class="btn btn-primary">Go somewhere</a>
            </div>
        </div>
    </div>
</div>
</template>
<script>
import SimplePostComponent from '../PostComponent.vue';
export default {
    components: {
        SimplePostComponent,
    },
    data(){
        return {
            posts : null
        }
    },
    mounted(){
        axios.get('/api/posts')
        .then(response => {

            this.posts = response.data.data;
        });
    }
}
</script>