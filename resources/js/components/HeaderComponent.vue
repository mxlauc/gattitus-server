<template>
<nav class="bg-white shadow-sm">
    <div class="py-2 px-3 py-sm-3 px-sm-4 py-lg-4 px-lg-4">
        <div class="row g-0">
            <div class="col-auto d-xl-none">
                <span  @click="toggleMenu" class="d-inline-block  py-2 px-3">
                    <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor" class="bi bi-list" viewBox="0 0 16 16">
                        <path fill-rule="evenodd" d="M2.5 12a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5zm0-4a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5zm0-4a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5z"/>
                    </svg>
                </span>
            </div>
            <div class="col d-none d-lg-block">

                <h5 class="fq-bold mb-0 f-fredoka">{{saludo}}</h5>
                <span>Hoy hay nuevas publicaciones para ver</span>
            </div>
            <div class="col-auto ms-auto">

                <div v-if="userLogged">
                    <a :href="userLogged?.url" class="d-inline-block text-decoration-none text-dark btn-user-url">
                        <span class="fw-bold ms-3 me-2 d-none d-sm-inline-block">{{userLogged?.name}}</span>
                        <img :src="userLogged?.avatar" class="user-img-small">
                    </a>

                    <span  data-bs-toggle="dropdown" aria-expanded="false" class="rounded-3 p-3 more-options">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-caret-down-fill" viewBox="0 0 16 16">
  <path d="M7.247 11.14 2.451 5.658C1.885 5.013 2.345 4 3.204 4h9.592a1 1 0 0 1 .753 1.659l-4.796 5.48a1 1 0 0 1-1.506 0z"/>
</svg>
                    </span>

                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="#">Action</a></li>
                        <li><a class="dropdown-item" href="#">Another action</a></li>
                        <li><a class="dropdown-item" href="#">Something else here</a></li>
                        <li><hr class="dropdown-divider"></li>
                        <li><a class="dropdown-item" href="#" @click="logout">Cerrar sesión</a></li>
                    </ul>

                </div>
                <a href="/auth/login/facebook" class="btn btn-primary" v-else> Iniciar sesión</a>






            </div>
        </div>
    </div>
</nav>




</template>
<script>
export default {
    mounted(){
    },
    computed:{
        saludo(){
            let hour = new Date().getHours();
            let saludoStr = hour < 12 ? "Buenos días" : (hour < 18 ? "Buenas tardes" : "Buenas noches");
            return `Hola ${this.userLogged?.name}, ${saludoStr} 🐱`;
        },
    },
    inject: ["userLogged"],
    methods:{
        logout(){
            axios.post("/auth/logout")
            .then(response=>{
                window.location = "/";
            });
        },
        toggleMenu(){
            document.querySelector("#sidebar").classList.add('show-sidebar')
            document.querySelector("#dark").classList.add('show-dark');
            document.body.style.overflow = 'hidden';
        }
    }
}
</script>
<style scoped>
.user-img-small{
    border-radius: 35%;
    width: 40px;
    height: 40px;
    object-fit: cover;
    border: 4px solid rgba(128, 128, 128, 0.2);
    box-sizing: content-box;
    transition: border 0.2s ease-out;
}
.btn-user-url{
    border-radius: 16px;
    transition: background-color 0.2s ease-out;
}
.btn-user-url:hover{
    background-color: #eee;
}
.btn-user-url:hover .user-img-small{
    border: 4px solid rgba(0, 0, 0, 0);
}
.more-options{
    transition: background-color 0.2s ease-out;
}
.more-options:hover{
    background-color: #eee;
}

</style>
