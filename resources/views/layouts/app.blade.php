<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
        <title>
            @hasSection('title')
                EatDB - @yield('title')
            @else
                EatDB
            @endif
        </title>
        @stack('styles')
        @stack('scripts')
        <style>
            @import url('https://fonts.googleapis.com/css2?family=Sofia+Sans&family=Solitreo&display=swap');

            * {
                box-sizing: content-box;
                font-family: 'Sofia Sans', sans-serif;
            }

            p, body {
                margin: 0;
            }

            a, a:visited, a:hover, a:active {
                text-decoration: none;
            }

            html {
                display: flex;
                min-height: 100%;
            }
            body {
                height: auto;
                width: 100%;
            }
        </style>
    </head>
    <body>
        @yield('base-content')
    </body>
</html>
