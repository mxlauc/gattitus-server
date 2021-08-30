@extends('layouts.main')

@section('script')
    <script src="https://cdn.jsdelivr.net/npm/@editorjs/editorjs@latest"></script>

    <script src="https://cdn.jsdelivr.net/npm/@editorjs/list@latest"></script>
    <script src="https://cdn.jsdelivr.net/npm/@editorjs/image@latest"></script>
    <script src="https://cdn.jsdelivr.net/npm/@editorjs/header@latest"></script>


    <script>
        var editor;
        window.addEventListener('load', function(e) {

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
                            buttonContent: "Escoge una image",
                            uploader: {
                                uploadByFile(file) {

                                    const storage = firebase.getStorage();
                                    console.log(firebase);
                                    firebase.connectStorageEmulator(storage, "localhost", 9199);


                                    console.log(file);
                                    const storageRef = firebase.ref(storage,
                                        'prueba/editorimagen23456.png');
                                    const uploadTask = firebase.uploadBytesResumable(storageRef, file);

                                    return new Promise((resolve, reject) => {
                                        let task = uploadTask.on('state_changed',
                                            (snapshot) => {
                                                // Observe state change events such as progress, pause, and resume
                                                // Get task progress, including the number of bytes uploaded and the total number of bytes to be uploaded
                                                const progress = (snapshot.bytesTransferred /
                                                    snapshot
                                                    .totalBytes) * 100;
                                                console.log('Upload is ' + progress + '% done');
                                            },
                                            (error) => {
                                                // Handle unsuccessful uploads
                                                reject();
                                            },
                                            () => {
                                                // Handle successful uploads on complete
                                                // For instance, get the download URL: https://firebasestorage.googleapis.com/...
                                                firebase.getDownloadURL(uploadTask.snapshot.ref)
                                                    .then((
                                                        downloadURL) => {
                                                        console.log('File available at',
                                                            downloadURL);
                                                        resolve({
                                                            success: 1,
                                                            file: {
                                                                url: downloadURL
                                                            }
                                                        });
                                                    });
                                            }
                                        );
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
        });

    </script>
@endsection

@section('style')
    <style>
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
@endsection

@section('content')
    <div class="card border-0 shadow-sm">
        <div class="card-body pt-3">
            <div id="editorjs"></div>
        </div>
    </div>
@endsection
