<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <link rel="stylesheet" href="{{ URL::asset('css/main.css') }}">        

        <title>GroupRun</title>           
    </head>
    <body>
        <div class="title">
        <img src="{{ URL::asset('svg/logorunner.svg') }}" alt="">
            <h1>GroupRun</h1>
        </div>
        
        <div id="main"></div>
        <script src="{{mix('js/app.js')}}"></script>                
    </body>
</html>
