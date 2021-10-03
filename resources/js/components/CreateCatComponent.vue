<template>
    <div>
        <!-- Modal -->
        <div
            class="modal fade"
            id="createCat"
            tabindex="-1"
            data-bs-backdrop="static"
            data-bs-keyboard="false"
            aria-hidden="true"
        >
            <div
                class="
                    modal-dialog modal-dialog-centered modal-dialog-scrollable
                "
            >
                <div
                    class="modal-content"
                    style="box-shadow: 2px 2px 8px rgba(0, 0, 0, 0.1)"
                >
                    <div class="modal-header">
                        <h5 class="modal-title">Create cat</h5>
                        <button
                            type="button"
                            class="btn-close"
                            data-bs-dismiss="modal"
                            aria-label="Close"
                        ></button>
                    </div>
                    <div class="modal-body">
                        <div>
                            <form
                                action="/"
                                @submit.prevent="enviarFormulario"
                                ref="formCrear"
                                method="POST"
                            >
                                <div class="row">
                                    <div class="col-5">
                                        <div class="position-relative" v-if="imagenPreview">
                                            <img
                                            v-bind:src="imagenPreview"
                                            class="w-100 rounded-3">
                                            <button
                                                type="button"
                                                class="btn-close bg-white shadow position-absolute top-0 end-0 m-3 p-2 rounded-circle"
                                                aria-label="Close"
                                                @click="borrarImagen">
                                            </button>
                                        </div>
                                        <label
                                            for="imageCat"
                                            class="form-control"
                                            tabindex="0"
                                            role="button"
                                            v-else
                                        >
                                            <img
                                                src="https://img.icons8.com/cotton/2x/image-file-add--v2.png"
                                                style="height: 20px"
                                            />
                                            Add image
                                        </label>
                                    </div>
                                    <div class="col-7">
                                        <div class="mb-3">
                                            <label class="form-label">Nombre</label>
                                            <input type="text" class="form-control" placeholder="Ejemplo: El señor Bigotes" name="name">
                                        </div>
                                        <div>
                                            <label class="form-label">Apodo (Opcional)</label>
                                            <textarea
                                                class="form-control"
                                                name="nickname"
                                                style="height: 100px;"
                                                ref="textarea"
                                                @keyup="keyup"
                                                placeholder="Ejemplo: El que me pide comida a las 5 de la mañana"
                                            ></textarea>
                                        </div>
                                        
                                    </div>
                                </div>
                                
                                
                                <input
                                    type="file"
                                    id="imageCat"
                                    class="d-none"
                                    accept="image/png, image/jpeg"
                                    @change="mostrarPreview"
                                />
                            </form>

                            

                            
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button
                            type="button"
                            class="btn btn-primary w-100 mt-2"
                            :disabled="disableButton"
                            @click="enviarFormulario"
                        >
                            Publish
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>
<script>
import {Modal} from 'bootstrap';

export default {
    inject: ["userLogged"],
    data() {
        return {
            imagenPreview: null,
            textareaLength: 0,
            imageId: null,
        };
    },
    mounted(){
    },
    computed:{
        disableButton(){
            return !this.imagenPreview && !this.textareaLength;
        }
    },
    emits: ["postCreated"],
    methods: {
        keyup(e){
            this.textareaLength = this.$refs.textarea.value.trim().length;
        },
        enviarFormulario(e) {
            e.preventDefault();

            var formData = new FormData(this.$refs.formCrear);
            formData.append('image_id', this.imageId);
            axios.post('/cats', formData)
            .then((response) => {
                console.log(response.data);
                this.$refs.formCrear.reset();
                this.imageId = null;
                this.textareaLength = 0;
                this.imagenPreview = null;
                let modal = Modal.getInstance(document.getElementById('createCat'));
                modal.hide();
                //this.$emit("postCreated", response.data.data);
                //this.ocultarModal();
            })
            .catch((error) => {
                console.log(error);
            });
        },
        ocultarModal() {
            var myModal = window.bootstrap.Modal.getInstance(document.getElementById("createCat"));
            myModal.hide();
            this.imagenPreview = null;
            this.$refs.formCrear.reset();
        },
        mostrarPreview(e) {
            //this.imagenPreview = URL.createObjectURL(e.target.files[0]);
            let formData = new FormData();
            formData.append('file', e.target.files[0]);

            axios.post('/images', formData,{
                headers: {
                    'Content-Type': 'multipart/form-data'
                }
            })
            .then(response=>{
                console.log(response.data.url);
                this.imagenPreview = response.data.url;
                this.imageId = response.data.imageId;
            })
            .catch(response=>{
                console.log(response);
            });

        },
        borrarImagen(){
            this.$refs.formCrear.imagen.value = ''
            this.imagenPreview = null;
        },
    },
};
</script>
<style scoped>
</style>
