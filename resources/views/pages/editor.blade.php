@extends('layouts.main')

@section('script')
    <script src="https://cdn.jsdelivr.net/npm/@editorjs/editorjs@latest"></script>

    <script src="https://cdn.jsdelivr.net/npm/@editorjs/list@latest"></script>
    <script src="https://cdn.jsdelivr.net/npm/@editorjs/image@latest"></script>
    <script src="https://cdn.jsdelivr.net/npm/@editorjs/header@latest"></script>


    <script>
        var editor;
        window.addEventListener('load', function() {
            editor = new EditorJS({
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
                            endpoints: {
                                byFile: 'http://localhost:8008/uploadFile', // Your backend file uploader endpoint
                                byUrl: 'http://localhost:8008/fetchUrl', // Your endpoint that provides uploading by Url
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
        });

    </script>
@endsection

@section('style')
<style>
    #editorjs h2{
        color: #f90;
        font-weight: bold;
    }
</style>
@endsection

@section('content')
    <div class="card border-0 shadow-sm">
        <div class="card-body pt-3">
            <div id="editorjs"></div>
        </div>
    </div>
@endsection
