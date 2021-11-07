<template>
    <div class="dropdown d-inline-block" role="button">
        <svg xmlns="http://www.w3.org/2000/svg"
            width="35"
            height="35"
            data-bs-toggle="dropdown" aria-expanded="false"
            fill="currentColor"
            class="p-1"
            :id="'myDropdown' + simplePublicationId"
            viewBox="0 0 16 16">
            <path d="M2.5 1A1.5 1.5 0 0 0 1 2.5v11A1.5 1.5 0 0 0 2.5 15h6.086a1.5 1.5 0 0 0 1.06-.44l4.915-4.914A1.5 1.5 0 0 0 15 8.586V2.5A1.5 1.5 0 0 0 13.5 1h-11zM2 2.5a.5.5 0 0 1 .5-.5h11a.5.5 0 0 1 .5.5V8H9.5A1.5 1.5 0 0 0 8 9.5V14H2.5a.5.5 0 0 1-.5-.5v-11zm7 11.293V9.5a.5.5 0 0 1 .5-.5h4.293L9 13.793z"/>
        </svg>
        <div class="dropdown-menu dropdown-menu-end transparent">
            <div class="contenedorGifs">
                <div class="contenedorInput">
                    <input type="text" :placeholder="__('Search')" @keyup="escribir" ref="input">
                </div>
                <div style="height: 344px; overflow: auto">
                    <div class="row g-0" :id="['masonry-gifs-row' + simplePublicationId]">
                        <div class="col col-6" v-for="gif in gifs" v-bind:key="gif" @click="imprimir(gif.media[0].tinygif.url)">
                            <gif-searched-component
                                :img-url="gif.media[0].nanogif.url">
                            </gif-searched-component>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


</template>
<script>
const sharedData = {
    gifs: [],
    yaCargoElPrimerComponente : false
};
import GifSearchedComponent from './GifSearchedComponent.vue';
export default {
    components:{
        GifSearchedComponent,
    },
    data(){
        return {
            gifs: [],
            timeOut: null,
            textoEscrito: ''
        };
    },
    inject: ['simplePublicationId'],
    mounted(){
        var myDropdown = document.getElementById('myDropdown' + this.simplePublicationId)
        myDropdown.addEventListener('shown.bs.dropdown', ()=> {
            this.$refs.input.focus();
            if(!sharedData.yaCargoElPrimerComponente){
                sharedData.yaCargoElPrimerComponente = true;
                this.cargarDefaultGifs();
            }else if(this.gifs.length == 0){
                this.gifs = sharedData.gifs;
            }
        })
    },
    emits: ['gifSeleccionado'],
    methods:{
        cargarDefaultGifs(){
            axios.get("https://g.tenor.com/v1/search?q=gente alegre&key=L8942WRVS35R&limit=20&media_filter=basic&locale=es_PE&ar_range=standard")
            .then(response=>{
                this.gifs = response.data.results;
                sharedData.gifs = response.data.results;
            });
        },
        escribir(){
            clearTimeout(this.timeOut);
            this.timeOut = setTimeout(()=>{
                let texto = this.$refs.input.value.trim();
                if(texto != this.textoEscrito){
                    this.textoEscrito = texto;
                    this.buscarGifs();
                }
            }, 1000);
        },
        buscarGifs(){
            axios.get(`https://g.tenor.com/v1/search?q=${this.textoEscrito}&key=L8942WRVS35R&limit=20&media_filter=basic&locale=es_PE&ar_range=standard`)
            .then(response=>{
                this.gifs = response.data.results;
            });
        },
        imprimir(url){
            this.$emit('gifSeleccionado', url);
        }
    }

}
</script>
<style scoped>
.contenedorInput{
    background-color: #f0f0f0;
    padding: 5px 20px;
    margin: 10px;
    border-radius: 15px;
    height: 36px;

}
.contenedorGifs{
    height: 400px;
    width: 350px;
    max-width: 80vw;
    border: 1px solid #ddd;
    border-radius: 6px;
    background-color: #fff;
    box-shadow: 4px 4px 10px rgba(0, 0, 0, 0.2);
    overflow: hidden;
}
input{
    background-color: transparent;
    width: 100%;
    border: none;
    outline: none;
}
.transparent{
    background-color: transparent;
    border: none;
    box-shadow: none;
}
</style>
