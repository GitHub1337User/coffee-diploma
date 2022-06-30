<!doctype html>
<html lang="en">
<head>
{{--    <style>--}}
{{--        .load-holder{--}}
{{--            background: #49281A;--}}
{{--            position: absolute;--}}
{{--            top:0;--}}
{{--            left: 0;--}}
{{--            width: 100vw;--}}
{{--            height: 100vh;--}}
{{--            max-width: 100%;--}}
{{--            max-height: 100%;--}}
{{--            z-index: 50000;--}}
{{--        }--}}
{{--        body{--}}
{{--            position: relative;--}}
{{--        }--}}
{{--    </style>--}}
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
    <link rel="stylesheet" href="{{asset('css/app.css')}}" id="styles">
    <title>Barista-club: @yield('title')</title>
</head>
<body>
{{--<div class="load-holder">--}}
{{--    <h1>Загрузка...</h1>--}}
{{--</div>--}}
@include('includes.header')

@yield('content')

@include('includes.footer')
<script src="{{asset('js/app.js')}}"></script>
{{--<script>--}}

{{--    function func() {--}}
{{--        // $(".content").show(); // включаем контент--}}
{{--        $(".load-holder").hide(); // выключаем сообщение "загрузки"--}}
{{--    }--}}

{{--    setTimeout(func, 5000); // 5 секунд "заглушка"--}}
{{--</script>--}}
</body>
</html>
