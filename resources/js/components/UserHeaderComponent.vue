<template>
    <div class="card shadow-sm">
        <div class="card-body p-4">
            <div class="row gy-3">
                <div class="col-12 col-sm-3 col-md-2 text-center">
                    <img :src="user?.image.url_md" class="img-fluid shadow w-100" style="max-width: 160px; border-radius: 20%;">
                </div>
                <div class="col-12 col-sm-9 col-md-10 text-center text-sm-start">
                    <h1 class="mb-0" style="font-weight: 900">{{user?.name}}</h1>
                    <h6>{{'@' + user?.username}}</h6>
                    <span class="d-block">Se unio el 3 de Septiembre del 2021</span>
                    <span class="d-block">activo hace 3 horas</span>
                    <button class="btn btn-sm btn-primary mt-2" @click="follow">{{ (Array.isArray(user?.my_follow) ? user?.my_follow.length : user?.my_follow) ? 'Dejar de seguir' : 'Seguir' }}</button>
                </div>    
            </div>    
        </div>
    </div>
</template>
<script>
export default {
    data(){
        return {
            user: null
        };
    },
    props: ['username'],
    mounted(){
        this.getUser(this.username);
    },
    methods: {
        getUser(username){
            axios.get(`/@${username}`)
            .then(response => {
                this.user = response.data;
            })
            .catch(error => {
                console.error(error);
            });
        },
        follow(){
            axios.post(`/followers`,{
                user_id: this.user.id
            })
            .then(response => {
                this.user.my_follow = response.data.following;
            })
            .catch(error => {
                console.error(error);
            })
        }
    }
}
</script>
<style scoped>

</style>