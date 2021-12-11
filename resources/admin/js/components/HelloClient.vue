<template>
    <div>
        <span>hola cliente {{user}} jeje son las {{3+5}} de la tarde</span>
        <button @click="saludar">saluda</button>
        <button @click=aumento>Aumentar contador: {{contador}}</button>
    </div>
</template>
<script>
export default {
    
    created(){
        console.log('antes de ser creado');
        this.aumento();
    },
    data(){
        return {
            user: "maximo",
            contador: 100,
        };
    },
    mounted(){
        console.log('montado');
    }
    ,
    methods: {
        saludar(){
            alert('hola a todos');
        },
        aumento(){
            this.contador++;
        }
    }
}
</script>
