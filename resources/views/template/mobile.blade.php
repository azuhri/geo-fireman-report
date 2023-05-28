<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Geo Fireman Report | @yield('title') </title>
    @vite('resources/css/app.css')
    <link rel="stylesheet" href="{{asset('css/toast.style.min.css')}}">
    @yield("css")
</head>
<body class="flex justify-center bg-gray-200">
    <div id="app" class="w-[600px] md:w-[500px] bg-slate-50 h-full">
        @yield('content')
    </div>
    <script src="{{asset('js/jquery3.7.js')}}"></script>
    @vite('resources/js/app.js')
    <script src="{{asset('js/toast.script.js')}}"></script>
    @yield('js')
</body>
</html>