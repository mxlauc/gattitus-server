<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <title>Gattitus</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no">
    <link rel="shortcut icon" href="https://www.gattitus.com/gattitus.png" type="image/png">
    <base href="/">
    <link rel="manifest" href="manifest.webmanifest">
    <meta name="theme-color" content="#e35300">
  
    <!-- Open Graph / Facebook -->
    <meta property="og:type" content="website">
    <meta name="keywords" content="gatos, michi, gatitos, minino, fotos de gatos, fotos, gututus">
    <meta property="og:title" content="Gattitus">
    <meta property="og:description" content="Comparte fotos de tu gato y descubre fotos de gatos de otros usuarios. Únete a Gattitus.">
    <meta name="description" content="Comparte fotos de tu gato y descubre fotos de gatos de otros usuarios. Únete a Gattitus.">
    <meta property="og:image" content="https://gattitus.com/gattitus-wallpaper.png">
    <meta property="og:url" content="https://www.gattitus.com/">

    <!-- Twitter -->
    <meta property="twitter:url" content="https://www.gattitus.com/">
    <meta property="twitter:title" content="Gattitus">
    <meta property="twitter:description" content="Comparte fotos de tu gato y descubre fotos de gatos de otros usuarios. Únete a Gattitus.">
    <meta property="twitter:image" content="https://gattitus.com/gattitus-wallpaper.png">

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Varela+Round&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Fredoka+One&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Roboto&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Rubik&display=swap" rel="stylesheet">

    <!-- Styles -->
    <style>
        * {
            font-family: 'Roboto', sans-serif;
        }

        .f-fredoka {
            font-family: 'Fredoka One', cursive;
        }
        .f-rubick label, .f-rubick p, .f-rubick span{
            font-family: 'Rubik', sans-serif !important;
        }

    </style>
    <link rel="stylesheet" href="{{ mix('css/app.css') }}">
    <link rel="stylesheet" href="{{ mix('css/custom.css') }}">

    <style>
@media (max-width: 1199.98px) {
    #sidebar{
        position: fixed;
        top: 0px;
        left: 0px;
        transform: translateX(-100%);
        transition: transform 0.4s ease-out;
        z-index: 1200;
    }
    #dark{
        position: fixed;
        top: 0px;
        left: 0px;
        width: 100vw;
        height: 100vh;
        background-color: #000;
        z-index: 1100;
        display: none;
        opacity: 0;
        transition:  opacity 0.4s ease-out;
    }
    .show-sidebar{
        transform: translateX(0%) !important;
    }
    .show-dark{
        display: block !important;
        opacity: 0.5 !important;
    }
}



    </style>


@yield('style')
@yield('script')


</head>

<body>
    <audio src="https://www.gattitus.com/assets/audio/cat_meow.mp3" id="soundMeow" preload="auto" style="display: none;"></audio>
    <div class="container-xxl px-0" id="app">
        @include('sections.header')
        <div class="row gx-0">
            <div id="dark">
            </div>
            
            @include('sections.sidebar')
            
            <div class="col">
                <div class="px-0 px-sm-4" style="padding-top: 80px;">
                    @yield('content')
                </div>
            </div>
        </div>
    </div>

    <script src="{{ mix('js/app.js') }}"></script>
    <script>
@auth
        userLogged = {
            id: {{Auth::user()->id}},
            name: "{{Auth::user()->name}}",
            username: "{{Auth::user()->username}}",
            avatar: "{!!Auth::user()->image->url_xs!!}",
            url: "{{Auth::user()->getUrl()}}",
        };
@else
        userLogged = null;
@endauth
        app.provide("userLogged", userLogged);
        app.mount("#app");
    </script>
    <script>
        document.querySelector("#dark").addEventListener("click", function(){
            document.querySelector("#sidebar").classList.remove('show-sidebar')
            document.querySelector("#dark").classList.remove('show-dark');
            document.body.style.overflow = 'auto';
        });
    </script>
</body>

</html>
