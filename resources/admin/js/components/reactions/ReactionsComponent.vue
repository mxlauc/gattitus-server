<template>
    <div>
        <router-link class="btn btn-success float-end" to="/reactions/create">Crear reaccion</router-link>
        <table class="table">
            <thead>
                <tr>
                    <th scope="col"></th>
                    <th scope="col">Nombre</th>
                    <th scope="col">Nombre a mostrar</th>
                    <th scope="col">Nombre a mostrar</th>
                    <th scope="col">Imagenes</th>
                </tr>
            </thead>
            <tbody>
                <tr v-for="(r, i) in reactions" :key="r">
                    <th scope="row">{{ i + 1 }}</th>
                    <td>{{r.name}}</td>
                    <td>{{r.display_name}}</td>
                    <td>{{r.display_name_es}}</td>
                    <td>
                        <img :src="r.image_svg" class="reaction-img">
                        <img :src="r.image_gif" class="reaction-img">
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
</template>

<script>
export default {
    data(){
        return {
            reactions: null,
        }
    },
    mounted(){
        this.getReactions();
    },
    methods:{
        getReactions(){
            axios.get('/reactions')
            .then(response => {
                this.reactions = response.data;
            })
            .catch(error => {
                console.log(error);
            });
        }
    }
};
</script>
<style scoped>
.reaction-img{
    object-fit: contain;
    width: 30px;
    height: 30px;

}
</style>