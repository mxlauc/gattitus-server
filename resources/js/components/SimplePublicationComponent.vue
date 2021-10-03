<template>
  <div
    class="card border-0 mb-3 overflow-hidden card-publication"
    @dblclick="doubleclick();"
    @click="click();"
    style="background-color: #{{publication.color}}; background-image: url({{publication.imagen}})"
    :style="{backgroundColor: '#' + publication.color, backgroundImage: `url(${publication.image})`}"
    oncontextmenu="return false;">
    <div class="header-publication">
      <div class="row no-gutters px-2 pt-2">
        <div class="col-8">
          <a :href="publication.user.url" class="text-decoration-none">
            <img
              class="img-user-publication"
              :src="publication.user.avatar"
            />
            <span class="name-user-publication ms-2" role="button">{{publication.user.name}}</span>
          </a>
        </div>
        <div class="col-4">
          <span class="time-publication">Hace 3 minutos</span>
        </div>
      </div>
      <div class="px-2">
        <div class="contenedor-gatos">
          <div
            class="imgGatosEtiquetados"
          ></div>
        </div>
      </div>
    </div>
    <div class="content-bottom-publication">
      <div class="sectionActions text-end">
        <div class="itemAction">
          <svg
            xmlns="http://www.w3.org/2000/svg"
            class="imgAction"
            fill="currentColor"
            viewBox="0 0 16 16"
          >
            <path
              d="M16 8s-3-5.5-8-5.5S0 8 0 8s3 5.5 8 5.5S16 8 16 8zM1.173 8a13.133 13.133 0 0 1 1.66-2.043C4.12 4.668 5.88 3.5 8 3.5c2.12 0 3.879 1.168 5.168 2.457A13.133 13.133 0 0 1 14.828 8c-.058.087-.122.183-.195.288-.335.48-.83 1.12-1.465 1.755C11.879 11.332 10.119 12.5 8 12.5c-2.12 0-3.879-1.168-5.168-2.457A13.134 13.134 0 0 1 1.172 8z"
            />
            <path
              d="M8 5.5a2.5 2.5 0 1 0 0 5 2.5 2.5 0 0 0 0-5zM4.5 8a3.5 3.5 0 1 1 7 0 3.5 3.5 0 0 1-7 0z"
            />
          </svg>
          <br />
          <span class="spanAction">Visto por 45</span
          >
        </div>
        <div class="itemAction">
          <svg
            xmlns="http://www.w3.org/2000/svg"
            class="imgAction"
            fill="currentColor"
            viewBox="0 0 16 16"
          >
            <path v-if="true"
                fill-rule="evenodd"
                d="M8 1.314C12.438-3.248 23.534 4.735 8 15-7.534 4.736 3.562-3.248 8 1.314z"
              />
            <path v-else
                d="M8 2.748l-.717-.737C5.6.281 2.514.878 1.4 3.053c-.523 1.023-.641 2.5.314 4.385.92 1.815 2.834 3.989 6.286 6.357 3.452-2.368 5.365-4.542 6.286-6.357.955-1.886.838-3.362.314-4.385C13.486.878 10.4.28 8.717 2.01L8 2.748zM8 15C-7.333 4.868 3.279-3.04 7.824 1.143c.06.055.119.112.176.171a3.12 3.12 0 0 1 .176-.17C12.72-3.042 23.333 4.867 8 15z"
              />
          </svg>
          <br />
          <span class="spanAction"
            >12K Me Encanta</span
          >
        </div>
        <div class="itemAction">
          <svg
            xmlns="http://www.w3.org/2000/svg"
            class="imgAction"
            fill="currentColor"
            viewBox="0 0 16 16"
          >
            <path
              d="M14 0a2 2 0 0 1 2 2v12.793a.5.5 0 0 1-.854.353l-2.853-2.853a1 1 0 0 0-.707-.293H2a2 2 0 0 1-2-2V2a2 2 0 0 1 2-2h12z"
            />
          </svg>
          <br />
          <span class="spanAction"
            >34 Comentarios</span
          >
        </div>
      </div>
      <div class="sectionComments">
        
      </div>
      <p class="description" v-if="publication.description">
        {{ publication.description }}
      </p>
    </div>

  </div>
</template>
<script>
export default {
    inject: ["userLogged"],
    props: ["publication"],
    methods: {
        click(){

        },
        doubleclick(){

        }
    },
};
</script>
<style scoped>
.card-publication{
    height: 480px;
    border-radius: 0px;
    box-shadow: #00000040 2px 2px 10px;
    
    background-size: 100%;
    background-position: center center;
    background-repeat: no-repeat;
    max-width: 500px;
    margin: auto;
}
@media (min-width: 992px) {
    .card-publication{
        border-radius: .25rem;
        height: 560px;
    }
}
.card-publication{
    
}


.img-user-publication{
width: 35px;
height: 35px;
border-radius: 50%;
padding: 2px;
background-color: #ffffff;
box-shadow: #000000 1px 1px 5px;
}
.name-user-publication{
font-weight: bold;
font-size: 15px;
color: #ffffff;
text-shadow: #000000 1px 1px 3px;
}
.time-publication{
    font-size: 12px;
    color: #ffffff;
    text-shadow: #000000 1px 1px 3px;
    float: right;
    margin-right: 10px;
    margin-top: 6px;

}
.description{
background: linear-gradient(rgba(0, 0, 0, 0), rgba(0, 0, 0, 0.3), rgba(0, 0, 0, 0.3));
margin: 0px;
padding: 10px;
text-align: justify;
color: #ffffff;
text-shadow: #000000 2px 2px 3px;
width: 100%;
font-size: 13px;
}
.header-publication{
position: absolute;
width: 100%;
}
.content-bottom-publication{
position: absolute;
bottom: 0px;
width: 100%;
}
.sectionComments{
}
.sectionActions{
/*flex: 0 0 50px;*/

}

.imgAction{
    padding: 10px;
    padding-bottom: 0px;
    color: white;
    width: 45px;
    margin-left: auto;
    margin-right: auto;
    -webkit-filter: drop-shadow( 1px 2px 1px rgba(0,0,0,0.5));
    filter: drop-shadow( 1px 2px 1px rgba(0, 0, 0, 0.5));
    cursor: pointer;
}
.spanAction{
    display: inline-block !important;
    display: block;
    color: #ffffff;
    font-weight: bold;
    font-size: 12px;
    text-shadow: 1px 1px 0px #000000;
    cursor: pointer;
    padding-right: 10px;
}
.itemAction{
    
    
}

.imgGatosEtiquetados{
    height: 35px;
    width: 35px;
    background-position: center center;
    background-repeat: no-repeat;
    background-size: cover;
    float: left;
    margin-right: 3px;
    border-radius: 50%;
    box-shadow: 1px 1px 3px #000000;
    border: solid 1px #fff;
}

.contenedor-gatos{
    width: fit-content;
    float: right;
    height: 40px;
}
</style>