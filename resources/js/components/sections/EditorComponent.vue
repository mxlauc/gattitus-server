<template>
    <div class="card border-0 shadow-sm">
        <div class="card-body pt-3">
            <div id="editorjs"></div>
        </div>
    </div>
</template>
<script>
export default {
    mounted(){
            var editor = new EditorJS({
                data: {
                    "time": 1629663049769,
                    "blocks": [{
                        "id": "headerGATTITUS",
                        "type": "header",
                        "data": {
                            "text": "Escribe un gran titulo",
                            "level": 2
                        }
                    }, {
                        "id": "paragraphGATTITUS",
                        "type": "paragraph",
                        "data": {
                            "text": "Cuentanos que te paso"
                        }
                    }],
                    "version": "2.22.2"
                },
                tools: {
                    header: Header,
                    image: {
                        class: ImageTool,
                        config: {
                            buttonContent: "Escoge una image",
                            uploader: {
                                uploadByFile(file) {
                                    

                                    return new Promise((resolve, reject) => {
                                        let formData = new FormData();
                                        formData.append('file', file);
                                        axios.post('/images', formData, {
                                            headers: {
                                                'Content-Type': 'multipart/form-data'
                                            }
                                        })
                                        .then(response =>{
                                            resolve({
                                                success: 1,
                                                file: {
                                                    url: response.data.url
                                                }
                                            });
                                        })
                                        .catch(error=>{
                                            console.log(error);
                                            reject();
                                        });
                                    });

                                }
                            }
                        }
                    },
                    list: {
                        class: List,
                        inlineToolbar: true,
                    }



                },
                i18n: {
                    messages: {
                        ui: {
                            "blockTunes": {
                                "toggler": {
                                    "Click to tune": "Click para más opciones",
                                    "or drag to move": "O arrastra para mover"
                                },
                            },
                            "inlineToolbar": {
                                "converter": {
                                    "Convert to": "Convertir a"
                                }
                            },
                            "toolbar": {
                                "toolbox": {
                                    "Add": "Agregar elemento"
                                }
                            }
                        },
                        toolNames: {
                            "Text": "Texto",
                            "Heading": "Titulo",
                            "List": "Lista",
                            "Link": "Enlace",
                            "Bold": "Negrita",
                            "Italic": "Italica",
                        },
                        tools: {
                            "link": {
                                "Add a link": "Agregar enlace"
                            },
                            "stub": {
                                'The block can not be displayed correctly.': 'El elemento no puede ser mostrado correctamente'
                            }
                        },
                        blockTunes: {
                            "delete": {
                                "Delete": "Eliminar"
                            },
                            "moveUp": {
                                "Move up": "Subir"
                            },
                            "moveDown": {
                                "Move down": "Bajar"
                            }
                        },
                    }
                },
            });
    }
}
</script>
<style scoped>
        #editorjs {
            min-height: 70vh;
        }

        #editorjs h2 {
            color: #f90;
            font-weight: bold;
        }

        #editorjs .ce-toolbar__settings-btn {
            border-radius: 5px;
            background-color: #fff;
            border: 1px solid #eee;
        }

        #editorjs .icon--dots {
            color: #f90;
        }

        #editorjs .ce-settings__button {
            color: #f90;
        }

        #editorjs .ce-inline-toolbar__dropdown {
            color: #f90;
        }

        #editorjs .ce-inline-tool {
            color: #f90;
        }

        #editorjs .ce-toolbox__button {
            color: #f90;
        }

        #editorjs .ce-toolbar__plus {
            color: #f90;

        }

</style>