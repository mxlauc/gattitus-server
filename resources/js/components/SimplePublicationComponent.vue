<template>
  <div class="card card-publication rounded-5 border-0 shadow f-rubick mb-4">
    <div class="card-body">
      <div class="row g-0">
        <div class="col-auto">
          <img
              class="img-user-publication shadow"
              :src="publication.user.avatar"
            />
        </div>
        <div class="col px-2">
          <span class="name-user-publication fw-bold" role="button">{{publication.user.name}}</span>
          <span class="d-block text-black-50 fs-6" role="button"><small>Hace 5 minutos</small></span>
        </div>
        <div class="col-auto">
          
          <svg xmlns="http://www.w3.org/2000/svg"
            viewBox="0 0 32.055 32.055"
            width="20"
            height="20"
            class="text-black-50"
            fill="currentColor">
            <path d="M3.968,12.061C1.775,12.061,0,13.835,0,16.027c0,2.192,1.773,3.967,3.968,3.967c2.189,0,3.966-1.772,3.966-3.967
              C7.934,13.835,6.157,12.061,3.968,12.061z M16.233,12.061c-2.188,0-3.968,1.773-3.968,3.965c0,2.192,1.778,3.967,3.968,3.967
              s3.97-1.772,3.97-3.967C20.201,13.835,18.423,12.061,16.233,12.061z M28.09,12.061c-2.192,0-3.969,1.774-3.969,3.967
              c0,2.19,1.774,3.965,3.969,3.965c2.188,0,3.965-1.772,3.965-3.965S30.278,12.061,28.09,12.061z"/>
          </svg>

        </div>
      </div>
      
        <img
          class="img-publication img-fluid w-100 shadow-sm rounded-5 my-2"
          :src="publication.image"
        />
        <p class="fs-6 text-muted">
          {{publication.description}}
        </p>
        <hr class="mt-0 mb-2">
        <svg xmlns="http://www.w3.org/2000/svg"
            width="20"
            height="20"
            class="imgAction"
            fill="currentColor"
            viewBox="0 0 16 16">
            <path d="M16 8s-3-5.5-8-5.5S0 8 0 8s3 5.5 8 5.5S16 8 16 8zM1.173 8a13.133 13.133 0 0 1 1.66-2.043C4.12 4.668 5.88 3.5 8 3.5c2.12 0 3.879 1.168 5.168 2.457A13.133 13.133 0 0 1 14.828 8c-.058.087-.122.183-.195.288-.335.48-.83 1.12-1.465 1.755C11.879 11.332 10.119 12.5 8 12.5c-2.12 0-3.879-1.168-5.168-2.457A13.134 13.134 0 0 1 1.172 8z"/>
            <path d="M8 5.5a2.5 2.5 0 1 0 0 5 2.5 2.5 0 0 0 0-5zM4.5 8a3.5 3.5 0 1 1 7 0 3.5 3.5 0 0 1-7 0z"/>
          </svg>
          <svg xmlns="http://www.w3.org/2000/svg"
            width="20"
            height="20"
            class="imgAction"
            fill="currentColor"
            viewBox="0 0 16 16">
            <path v-if="true"
                fill-rule="evenodd"
                d="M8 1.314C12.438-3.248 23.534 4.735 8 15-7.534 4.736 3.562-3.248 8 1.314z"/>
            <path v-else
                d="M8 2.748l-.717-.737C5.6.281 2.514.878 1.4 3.053c-.523 1.023-.641 2.5.314 4.385.92 1.815 2.834 3.989 6.286 6.357 3.452-2.368 5.365-4.542 6.286-6.357.955-1.886.838-3.362.314-4.385C13.486.878 10.4.28 8.717 2.01L8 2.748zM8 15C-7.333 4.868 3.279-3.04 7.824 1.143c.06.055.119.112.176.171a3.12 3.12 0 0 1 .176-.17C12.72-3.042 23.333 4.867 8 15z"/>
          </svg>
          <svg xmlns="http://www.w3.org/2000/svg"
            width="20"
            height="20"
            class="imgAction"
            fill="currentColor"
            viewBox="0 0 16 16">
            <path d="M14 0a2 2 0 0 1 2 2v12.793a.5.5 0 0 1-.854.353l-2.853-2.853a1 1 0 0 0-.707-.293H2a2 2 0 0 1-2-2V2a2 2 0 0 1 2-2h12z"/>
          </svg>
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

@media (max-width: 575.98px) {
  .card-publication{
    border-radius: unset !important;
  }
}


.img-user-publication{
  width: 40px;
  height: 40px;
  border-radius: 0.8rem;
}
.img-publication{
  max-height: 500px;
  object-fit: cover;
}

</style>