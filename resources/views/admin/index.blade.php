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
    <link rel="stylesheet" href="{{ mix('css/custom.css') }}">


@yield('style')
@yield('script')


</head>

<body>
    <div id="app">
        <header-component></header-component>
        <div class="container pt-4" style="margin-top: 50px">
            <div class="row">
                <div class="col-auto">
                    <menu-component></menu-component>
                </div>
                <div class="col">
                    <div class="card shadow p-3">
                        <h1 class="mb-4">@{{ $route.meta.title }}</h1>                        
                        <router-view></router-view>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="{{ mix('js/admin/app.js') }}"></script>
    <script>
        app.mount("#app");
    </script>

</body>

</html>
