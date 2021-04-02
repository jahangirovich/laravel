<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">

    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <link href="{{ asset('css/style.css') }}" rel="stylesheet">

    </head>
    <body class="antialiased">
        <li><a href="{{ url('/ru') }}" ><i class="fa fa-language"></i> Ru</a></li>

        <li><a href="{{ url('/kz') }}" ><i class="fa fa-language"></i> KZ</a></li>

            <div>
            <!-- Here it is call variable where translates -->
                <h1>{{ __("page.welcome") }}</h1>
            </div>
    </body>
</html>
