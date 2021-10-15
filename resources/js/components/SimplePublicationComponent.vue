<template>
  <div class="card card-publication rounded-5 border-0 shadow f-rubick mb-4">
    <div class="card-body pb-0">
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
        <div class="rounded-5 img-container-publication shadow-sm my-2 position-relative"
        :style="{ aspectRatio: publication.image.aspect_ratio < 0.8 ? 0.8 : publication.image.aspect_ratio, background: `linear-gradient(45deg, ${publication.image.color_bl} 0%, ${publication.image.color_tr} 100%)`}">
          <img class="img-publication img-fluid w-100 shadow-sm opacity-0"
            :src="publication.image.url"
            @load="onLoadImage"/>
            <div class="position-absolute top-0 start-0 end-0 bottom-0"></div>
        </div>
        
        <p class="fs-6 mb-2 text-muted">
          {{publication.description}}
        </p>
        <hr class="my-0" style="opacity: 0.1;">


        <div class="row text-secondary g-0 fw-bold" role="button" style="user-select: none; font-size: 14px;">
          <div class="col text-center py-3 guide-3">
            <svg xmlns="http://www.w3.org/2000/svg"
                width="30"
                height="20"
                fill="currentColor"
                viewBox="0 0 16 16">
                <path d="m8 2.748-.717-.737C5.6.281 2.514.878 1.4 3.053c-.523 1.023-.641 2.5.314 4.385.92 1.815 2.834 3.989 6.286 6.357 3.452-2.368 5.365-4.542 6.286-6.357.955-1.886.838-3.362.314-4.385C13.486.878 10.4.28 8.717 2.01L8 2.748zM8 15C-7.333 4.868 3.279-3.04 7.824 1.143c.06.055.119.112.176.171a3.12 3.12 0 0 1 .176-.17C12.72-3.042 23.333 4.867 8 15z"/>
            </svg>
            Me encanta
          </div>
          <div class="col text-center py-3">
            <svg xmlns="http://www.w3.org/2000/svg"
                width="30"
                height="20"
                fill="currentColor"
                viewBox="0 0 16 16">
                <path d="M14 1a1 1 0 0 1 1 1v8a1 1 0 0 1-1 1h-2.5a2 2 0 0 0-1.6.8L8 14.333 6.1 11.8a2 2 0 0 0-1.6-.8H2a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1h12zM2 0a2 2 0 0 0-2 2v8a2 2 0 0 0 2 2h2.5a1 1 0 0 1 .8.4l1.9 2.533a1 1 0 0 0 1.6 0l1.9-2.533a1 1 0 0 1 .8-.4H14a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2H2z"></path>
            </svg>
            Comentar
          </div>
        </div>

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

        },
        onLoadImage(e){
          e.currentTarget.classList.remove('opacity-0')
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
.img-container-publication{
  overflow: hidden;
}
.img-publication{
  object-fit: cover;
  height: 100%;
  transition: opacity 0.3s ease-out;
}
.opacity-0{
  opacity: 0;
}


</style>