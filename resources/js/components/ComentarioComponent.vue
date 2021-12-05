<template>
    <div class="py-1">
        <div class="row g-0">
            <div class="col col-auto py-1">
                <a :href="comentario.user.url">
                    <img v-bind:src="comentario.user.image.url_sm" class="imagenUsuario shadow" />
                </a>
            </div>
            <div class="col ps-2 pt-1">
                <span class="text-break" style="font-size: 15px">
                    <a :href="comentario.user.url" class="text-dark text-decoration-none d-block mb-1">
                        <span class="fw-bold">
                            {{ comentario.user.name }}
                        </span>
                        <span style="color: #bbb;">
                            @{{ comentario.user.username }}
                        </span>
                    </a>
                    <p class="m-0" style="color: #777;">
                        {{ comentario.description}}
                    </p>
                    <div class="position-relative" v-if="comentario.gif_url">
                        <img :src="comentario.gif_url" class="img-fluid shadow-sm" style="border-radius: 10px;">
                        <span
                            class="px-1 rounded position-absolute bottom-0 start-0 m-1"
                            style="background-color:rgba(255,255,255,0.4);">
                            <img src="https://www.gstatic.com/tenor/web/attribution/via_tenor_logo_grey.png"
                                style="filter: drop-shadow(1px 1px 2px rgba(255, 255, 255, 1));"
                                width="50">
                        </span>
                    </div>
                </span>
                <div class="mb-1 pt-2 text-muted" style="font-size:13px;">
                    <span class="fw-bold" role="button" @click="like" :class="{'text-primary': miLike}" v-if="userLogged">{{__('Like')}}</span>
                    <span v-if="userLogged && contador"> ·</span>
                    <span class="fw-bold px-1" v-if="contador" data-bs-toggle="modal" v-bind:data-bs-target="'#likesComment' + comentario?.id" role="button"> {{contador}} </span>
                    <svg xmlns="http://www.w3.org/2000/svg"
                        v-if="!userLogged && contador"
                        class="ms-1"
                        width="14"
                        height="12"
                        style="margin-top: -4px;"
                        preserveAspectRatio="none"
                        fill="currentColor"
                        viewBox="0 0 16 16">
                        <path d="M6.956 1.745C7.021.81 7.908.087 8.864.325l.261.066c.463.116.874.456 1.012.965.22.816.533 2.511.062 4.51a9.84 9.84 0 0 1 .443-.051c.713-.065 1.669-.072 2.516.21.518.173.994.681 1.2 1.273.184.532.16 1.162-.234 1.733.058.119.103.242.138.363.077.27.113.567.113.856 0 .289-.036.586-.113.856-.039.135-.09.273-.16.404.169.387.107.819-.003 1.148a3.163 3.163 0 0 1-.488.901c.054.152.076.312.076.465 0 .305-.089.625-.253.912C13.1 15.522 12.437 16 11.5 16H8c-.605 0-1.07-.081-1.466-.218a4.82 4.82 0 0 1-.97-.484l-.048-.03c-.504-.307-.999-.609-2.068-.722C2.682 14.464 2 13.846 2 13V9c0-.85.685-1.432 1.357-1.615.849-.232 1.574-.787 2.132-1.41.56-.627.914-1.28 1.039-1.639.199-.575.356-1.539.428-2.59z"/>
                    </svg>
                    <span class="ms-3" v-if="userLogged || contador"></span>
                    <span>{{timeAgo(comentario.created_at)}}</span>
                </div>
            </div>
            <div class="col col-auto" v-if="userLogged && userLogged.id == comentario.user.id">
                <svg xmlns="http://www.w3.org/2000/svg"
                    fill="currentColor"
                    class="py-3 px-2"
                    style="width: 32px; color:#888;"
                    viewBox="0 0 16 16"
                    data-bs-toggle="dropdown"
                    aria-expanded="false">
                <path d="M3 9.5a1.5 1.5 0 1 1 0-3 1.5 1.5 0 0 1 0 3zm5 0a1.5 1.5 0 1 1 0-3 1.5 1.5 0 0 1 0 3zm5 0a1.5 1.5 0 1 1 0-3 1.5 1.5 0 0 1 0 3z"/>
                </svg>
                <ul class="dropdown-menu dropdown-menu-end shadow">
                    <li>
                        <button class="dropdown-item" type="button"
                            data-bs-toggle="modal"
                            v-bind:data-bs-target="'#editarComentarioModal' + postId"
                            v-bind:data-bs-id-comentario="comentario.id">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil-square" viewBox="0 0 16 16">
                            <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z"/>
                            <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z"/>
                            </svg>
                            {{__('Edit comment')}}
                        </button>
                    </li>
                    <li>
                        <button
                            class="dropdown-item"
                            type="button"
                            data-bs-toggle="modal"
                            v-bind:data-bs-target="'#eliminarComentarioModal' + postId"
                            v-bind:data-bs-id-comentario="comentario.id">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash-fill" viewBox="0 0 16 16">
                            <path d="M2.5 1a1 1 0 0 0-1 1v1a1 1 0 0 0 1 1H3v9a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2V4h.5a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1H10a1 1 0 0 0-1-1H7a1 1 0 0 0-1 1H2.5zm3 4a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 .5-.5zM8 5a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7A.5.5 0 0 1 8 5zm3 .5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 1 0z"/>
                            </svg>
                            {{__('Delete comment')}}
                        </button>
                    </li>
                </ul>


            </div>
        </div>
        
        <!-- Modal Ver Likes -->
    <div
        class="modal fade"
        v-bind:id="'likesComment' + comentario?.id"
        tabindex="-1"
        aria-hidden="true"
    >
        <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">{{__('These people liked this comment')}}</h5>
                    <button
                        type="button"
                        class="btn-close"
                        data-bs-dismiss="modal"
                        aria-label="Close"
                    ></button>
                </div>
                <div class="modal-body v-simple-infinite-scroll-container">
          <!--           <likes-component
                        v-if="showLikes"
                        :url="'/comments/' + comentario?.id + '/likes'">
                    </likes-component>
 -->
                </div>
            </div>
        </div>
    </div>
    </div>

</template>

<script>

/* import LikesComponent from './LikesComponent.vue'; */

export default {
    components : {
        //LikesComponent,
    },
    data(){
        return {
            miLike : false,
            contador : 0,
            showLikes: false,
        };
    },
    props: ["comentario"],
    inject: ["postId", "userLogged"],
    mounted(){
        this.miLike = this.comentario.myLike;
        this.contador = this.comentario.contador;

        var myModalEl = document.getElementById('likesComment' + this.comentario?.id)
        myModalEl.addEventListener('shown.bs.modal', () => {
            this.showLikes = true;
        });
    },
    methods:{
        like(){
            axios.post(`/comments/${this.comentario.id}/likes`)
            .then(response=>{
                this.miLike = response.data.miLike;
                this.contador = response.data.count;
            })
            .catch(response=>{
                console.log(response.data);
            });
        },
    },
};
</script>

<style scoped>
.imagenUsuario {
    border-radius: 30%;
    height: 40px;
}

</style>

