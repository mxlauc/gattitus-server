<template>
    <div>
        <form @submit.prevent="formSubmit" class="row g-3">
            <div class="col-md-12">
                <label class="form-label">Nombre</label>
                <input type="text" name="name" class="form-control" required />
            </div>
            <div class="col-md-6">
                <label class="form-label">Nombre a mostrar (English)</label>
                <input type="text" name="display_name" class="form-control" required />
            </div>
            <div class="col-md-6">
                <label class="form-label">Nombre a mostrar (Español)</label>
                <input type="text" name="display_name_es" class="form-control" required />
            </div>
            <div class="col-md-6">
                <label class="form-label">Imagen SVG</label>
                <input type="file" name="image_svg" class="form-control" required accept=".svg"/>
            </div>
            <div class="col-md-6">
                <label class="form-label">Imagen GIF</label>
                <input type="file" name="image_gif" class="form-control" required accept="image/*"/>
            </div>

            <div class="col-12">
                <button type="submit" class="btn btn-primary">Guardar</button>
            </div>
        </form>
    </div>
</template>

<script>
export default {
    methods: {
        formSubmit(e) {
            const formData = new FormData(e.srcElement)
            axios.post('/reactions', formData, {
                headers: {
                    'Content-Type': 'multipart/form-data'
                }
            })
            .then(response => {
                console.log(response);
                this.$router.push({ path: '/reactions', replace: true })
            })
            .catch(error => {
                console.log(error);
                console.error(error);
            });
        },
    },
};
</script>
<style scoped>
</style>