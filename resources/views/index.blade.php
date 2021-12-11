<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="shortcut icon" href="https://www.gattitus.com/gattitus.png" type="image/png">
    <title>Gattitus document</title>
    <link rel="stylesheet" href="{{ mix('css/app.css') }}">
    <link rel="stylesheet" href="{{ mix('css/custom.css') }}">

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Varela+Round&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Fredoka+One&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Roboto&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Rubik&display=swap" rel="stylesheet">

    <!-- Editorjs -->
    <script src="https://cdn.jsdelivr.net/npm/@editorjs/editorjs@latest"></script>

    <script src="https://cdn.jsdelivr.net/npm/@editorjs/list@latest"></script>
    <script src="https://cdn.jsdelivr.net/npm/@editorjs/image@latest"></script>
    <script src="https://cdn.jsdelivr.net/npm/@editorjs/header@latest"></script>

</head>
<body>
    <div id="app">
        <audio src="https://www.gattitus.com/assets/audio/cat_meow.mp3" id="soundMeow" preload="auto" style="display: none;"></audio>
    <div class="container-xxl px-0" id="app">
        <create-post-component></create-post-component>
        <create-cat-component></create-cat-component>
        <nav class="bg-white shadow-sm fixed-top" style="min-height: 64px;">
            <header-component></header-component>
        </nav>



        <div class="row gx-0">
            <div id="dark">
            </div>
            
            <div class="col-auto sticky-top ps-4" id="sidebar" style="width: 260px; height: 100vh;">
                <div class="d-flex flex-column h-100">
                    <div class="">
                        <a class="navbar-brand fw-bold text-black d-inline-block p-1 m-3 mb-0" href="/" style="font-size: 30px;">
                            <img src="https://www.gattitus.com/assets/icons/icon-72x72.png"
                                style="height: 40px; margin-top: -10px;">
                            <span>{{ env('APP_NAME') }}</span>
                        </a>
                        <div class="card shadow mt-3 p-2">
                            <ul class="options-sidebar">
                                <li class="options-sidebar-active">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor"
                                        class="bi bi-house" viewBox="0 0 16 16">
                
                                        <path fill-rule="evenodd"
                                            d="M7.293 1.5a1 1 0 0 1 1.414 0l6.647 6.646a.5.5 0 0 1-.708.708L8 2.207 1.354 8.854a.5.5 0 1 1-.708-.708L7.293 1.5z" />
                                        <path
                                            d="M6.5 14.5v-3.505c0-.245.25-.495.5-.495h2c.25 0 .5.25.5.5v3.5a.5.5 0 0 0 .5.5h4a.5.5 0 0 0 .5-.5v-7a.5.5 0 0 0-.146-.354L13 5.793V2.5a.5.5 0 0 0-.5-.5h-1a.5.5 0 0 0-.5.5v1.293L8.354 1.146a.5.5 0 0 0-.708 0l-6 6A.5.5 0 0 0 1.5 7.5v7a.5.5 0 0 0 .5.5h4a.5.5 0 0 0 .5-.5z" />
                                    </svg>
                                    <span>Inicio</span>
                                </li>
                                <li>
                                    <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor"
                                        class="bi bi-person-fill" viewBox="0 0 16 16">
                                        <path d="M3 14s-1 0-1-1 1-4 6-4 6 3 6 4-1 1-1 1H3zm5-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6z" />
                                    </svg>
                                    <span>Mi perfil</span>
                                </li>
                                <li>
                                    <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor"
                                        class="bi bi-intersect" viewBox="0 0 16 16">
                                        <path
                                            d="M0 2a2 2 0 0 1 2-2h8a2 2 0 0 1 2 2v2h2a2 2 0 0 1 2 2v8a2 2 0 0 1-2 2H6a2 2 0 0 1-2-2v-2H2a2 2 0 0 1-2-2V2zm5 10v2a1 1 0 0 0 1 1h8a1 1 0 0 0 1-1V6a1 1 0 0 0-1-1h-2v5a2 2 0 0 1-2 2H5zm6-8V2a1 1 0 0 0-1-1H2a1 1 0 0 0-1 1v8a1 1 0 0 0 1 1h2V6a2 2 0 0 1 2-2h5z" />
                                    </svg>
                                    <span><router-link to="/editor">Go to Editor</router-link></span>

                                </li>
                                <li>
                                    <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor"
                                        class="bi bi-house" viewBox="0 0 16 16">
                                        <path fill-rule="evenodd"
                                            d="M2 13.5V7h1v6.5a.5.5 0 0 0 .5.5h9a.5.5 0 0 0 .5-.5V7h1v6.5a1.5 1.5 0 0 1-1.5 1.5h-9A1.5 1.5 0 0 1 2 13.5zm11-11V6l-2-2V2.5a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5z" />
                                        <path fill-rule="evenodd"
                                            d="M7.293 1.5a1 1 0 0 1 1.414 0l6.647 6.646a.5.5 0 0 1-.708.708L8 2.207 1.354 8.854a.5.5 0 1 1-.708-.708L7.293 1.5z" />
                                    </svg>
                                    <span><router-link to="/user">Go to User</router-link></span>
                                </li>
                                <li>
                                    <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor"
                                        class="bi bi-house" viewBox="0 0 16 16">
                                        <path fill-rule="evenodd"
                                            d="M2 13.5V7h1v6.5a.5.5 0 0 0 .5.5h9a.5.5 0 0 0 .5-.5V7h1v6.5a1.5 1.5 0 0 1-1.5 1.5h-9A1.5 1.5 0 0 1 2 13.5zm11-11V6l-2-2V2.5a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5z" />
                                        <path fill-rule="evenodd"
                                            d="M7.293 1.5a1 1 0 0 1 1.414 0l6.647 6.646a.5.5 0 0 1-.708.708L8 2.207 1.354 8.854a.5.5 0 1 1-.708-.708L7.293 1.5z" />
                                    </svg>
                                    <span><router-link to="/landing">Go to Landing</router-link></span>
                                </li>
                                <li>
                                    <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor"
                                        class="bi bi-house" viewBox="0 0 16 16">
                                        <path fill-rule="evenodd"
                                            d="M2 13.5V7h1v6.5a.5.5 0 0 0 .5.5h9a.5.5 0 0 0 .5-.5V7h1v6.5a1.5 1.5 0 0 1-1.5 1.5h-9A1.5 1.5 0 0 1 2 13.5zm11-11V6l-2-2V2.5a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5z" />
                                        <path fill-rule="evenodd"
                                            d="M7.293 1.5a1 1 0 0 1 1.414 0l6.647 6.646a.5.5 0 0 1-.708.708L8 2.207 1.354 8.854a.5.5 0 1 1-.708-.708L7.293 1.5z" />
                                    </svg>
                                    <span>Inicio</span>
                                </li>
                                <li>
                                    <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor"
                                        class="bi bi-house" viewBox="0 0 16 16">
                                        <path fill-rule="evenodd"
                                            d="M2 13.5V7h1v6.5a.5.5 0 0 0 .5.5h9a.5.5 0 0 0 .5-.5V7h1v6.5a1.5 1.5 0 0 1-1.5 1.5h-9A1.5 1.5 0 0 1 2 13.5zm11-11V6l-2-2V2.5a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5z" />
                                        <path fill-rule="evenodd"
                                            d="M7.293 1.5a1 1 0 0 1 1.414 0l6.647 6.646a.5.5 0 0 1-.708.708L8 2.207 1.354 8.854a.5.5 0 1 1-.708-.708L7.293 1.5z" />
                                    </svg>
                                    <span>Inicio</span>
                                </li>
                                <li>
                                    <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor"
                                        class="bi bi-house" viewBox="0 0 16 16">
                                        <path fill-rule="evenodd"
                                            d="M2 13.5V7h1v6.5a.5.5 0 0 0 .5.5h9a.5.5 0 0 0 .5-.5V7h1v6.5a1.5 1.5 0 0 1-1.5 1.5h-9A1.5 1.5 0 0 1 2 13.5zm11-11V6l-2-2V2.5a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5z" />
                                        <path fill-rule="evenodd"
                                            d="M7.293 1.5a1 1 0 0 1 1.414 0l6.647 6.646a.5.5 0 0 1-.708.708L8 2.207 1.354 8.854a.5.5 0 1 1-.708-.708L7.293 1.5z" />
                                    </svg>
                                    <span>Inicio</span>
                                </li>
                                <li>
                                    <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor"
                                        class="bi bi-house" viewBox="0 0 16 16">
                                        <path fill-rule="evenodd"
                                            d="M2 13.5V7h1v6.5a.5.5 0 0 0 .5.5h9a.5.5 0 0 0 .5-.5V7h1v6.5a1.5 1.5 0 0 1-1.5 1.5h-9A1.5 1.5 0 0 1 2 13.5zm11-11V6l-2-2V2.5a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5z" />
                                        <path fill-rule="evenodd"
                                            d="M7.293 1.5a1 1 0 0 1 1.414 0l6.647 6.646a.5.5 0 0 1-.708.708L8 2.207 1.354 8.854a.5.5 0 1 1-.708-.708L7.293 1.5z" />
                                    </svg>
                                    <span>Inicio</span>
                                </li>
                                <li>
                                    <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor"
                                        class="bi bi-house" viewBox="0 0 16 16">
                                        <path fill-rule="evenodd"
                                            d="M2 13.5V7h1v6.5a.5.5 0 0 0 .5.5h9a.5.5 0 0 0 .5-.5V7h1v6.5a1.5 1.5 0 0 1-1.5 1.5h-9A1.5 1.5 0 0 1 2 13.5zm11-11V6l-2-2V2.5a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5z" />
                                        <path fill-rule="evenodd"
                                            d="M7.293 1.5a1 1 0 0 1 1.414 0l6.647 6.646a.5.5 0 0 1-.708.708L8 2.207 1.354 8.854a.5.5 0 1 1-.708-.708L7.293 1.5z" />
                                    </svg>
                                    <span>Inicio</span>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            
            <div class="col">
                <div class="px-0 px-sm-4" style="padding-top: 80px;">
                    <router-view></router-view>
                </div>
            </div>
        </div>
    </div>

    </div>
    <script src="{{ mix('js/app.js') }}"></script>
</body>
</html>