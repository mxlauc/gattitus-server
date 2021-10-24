<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Gattitus</title>
    <link rel="shortcut icon" href="https://www.gattitus.com/gattitus.png" type="image/png">

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
    <div class="row g-0" id="app">
        <div id="dark">
        </div>
        <div class="col-auto sticky-top bg-white" id="sidebar" style="width: 260px; height: 100vh;">
            @include('sections.sidebar')
        </div>
        <div class="col">
            @include('sections.header')
            <div class="px-0 px-sm-4" style="padding-top: 80px;">
                @yield('content')
            </div>
        </div>
    </div>

    <script src="{{ mix('js/app.js') }}"></script>
    <script>
@auth
        userLogged = {
            id: {{Auth::user()->id}},
            name: "{{Auth::user()->name}}",
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
