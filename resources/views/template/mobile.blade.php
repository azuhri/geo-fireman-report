<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>O'Fireport | @yield('title') </title>
    <link rel="icon" href="{{ asset('icons/Logogram.png') }}" type="image/png">
    @vite('resources/css/app.css')
    <link rel="stylesheet" href="{{ asset('css/toast.style.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/toast.style.css') }}">
    @yield('css')
</head>

<body class="flex justify-center bg-gray-200">
    <div id="app" class="w-[600px] md:w-[500px] bg-slate-50 h-full relative">
        @yield('content')
    </div>
    <script src="{{ asset('js/jquery3.7.js') }}"></script>
    @vite('resources/js/app.js')
    <script src="{{ asset('js/toast.script.js') }}"></script>
    <script type="text/javascript" src="../node_modules/tw-elements/dist/js/tw-elements.umd.min.js"></script>
    @yield('js')
</body>

</html>
