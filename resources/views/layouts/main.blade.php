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

    <!-- Styles -->
    <style>
        * {
            font-family: 'Varela Round', sans-serif;
        }

        .f-fredoka {
            font-family: 'Fredoka One', cursive;
        }

    </style>
    <link rel="stylesheet" href="{{ mix('css/app.css') }}">
    <link rel="stylesheet" href="{{ mix('css/custom.css') }}">
    <script src="{{ mix('js/app.js') }}"></script>
    @yield('style')
    @yield('script')

</head>

<body>
    <div class="row g-0">
        <div class="col-auto sticky-top bg-white" style="width: 260px; height: 100vh;">
            @include('sections.sidebar')
        </div>
        <div class="col">
            @include('sections.header')
            <div class="p-4">
                @yield('content')
            </div>
        </div>
    </div>
</body>

</html>
